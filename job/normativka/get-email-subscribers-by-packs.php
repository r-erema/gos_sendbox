<?php

/**
 * Пишет в файл юзеров подписанных на какой-либо пакет.
 * Пакеты передаются в параметра p, через запятую:
 * get-email-subscribers-by-packs.php -p "Всё для бухгалтера,Всё для юриста"
 */

$config = require __DIR__ . '/config.php';
/** @var PDO $pdo */
$pdo = require __DIR__ . '/db.php';

$opts = getopt('p:');

$file = fopen($config['subscribers_file'], 'w');
if ($file === false) {
    echo("Не удалось создать файл '{$config['subscribers_file']}'" . PHP_EOL);
    exit(2);
}

$packsNames = [];
if (isset($opts['p'])) {
    $packsNames = explode(',', $opts['p']);
    $packsNames = array_map(function ($pack) use ($pdo) {
        return $pdo->quote(trim($pack));
    }, $packsNames);
}
$packsNames = implode(',', $packsNames);
/*$stmt = $pdo->query('
            SELECT user_id, user_login, user_code, user_name
            FROM nr_packages
            LEFT JOIN nr_package_order ON po_pk_id = pk_id
            LEFT JOIN nr_codes ON code_order_id = po_or_id
            LEFT JOIN fn_users ON user_id = code_activated_user_id
            WHERE ' .
             ($packsNames ? "pk_name IN ({$packsNames}) AND " . PHP_EOL : '') .
            'code_activated_user_id IS NOT NULL AND
             code_is_active = 1 AND
             user_news_letters = 1 AND
             user_invalid_email = 0
            GROUP BY user_id'
);*/
$stmt = $pdo->query('SELECT user_passport_id, user_login, user_code, user_name FROM fn_users WHERE user_invalid_email = 0 AND user_news_letters = 1');

$stmt->execute();

$salt = $config['salt'];
$rows = '';
while (false !== ($userData = $stmt->fetch())) {
    $signature = preg_replace(
        '#[/=+]#',
        '',
        base64_encode(md5(sprintf('(57f-%s-gh-%s-yy', $userData['user_passport_id'], $userData['user_code']) . $salt, true)) .
        base64_encode(md5(sprintf('%s9s%swl', $userData['user_passport_id'], $userData['user_code']) . $salt, true))
    );
    $rows .= "{$userData['user_login']}\t{$userData['user_name']}\t{$signature}" . PHP_EOL;
}

if (fwrite($file, $rows)) {
    echo("Файл с пользователями '{$config['subscribers_file']}' готов" . PHP_EOL);
    exit(0);
} else {
    echo("В файл '{$config['subscribers_file']}' ничего не записалось" . PHP_EOL);
    exit(2);
}
