<?php
/**
 * Скрипт создает два файла в котором e-mail-ы для рассылок и хэши для отписок платных и всех остальных пользователей
 */

/**
 *
 * Запросы к базе:
 *
 * Платные пользователи
 *
SELECT fn_users.user_id, fn_users.user_login, fn_users.user_code FROM fn_users
LEFT JOIN nr_codes ON nr_codes.code_activated_user_id = fn_users.user_id
LEFT JOIN nr_orders ON nr_orders.order_id = nr_codes.code_order_id
LEFT JOIN nr_package_order ON nr_package_order.po_or_id = nr_orders.order_id
WHERE nr_codes.code_is_active = 1 AND nr_package_order.po_pk_id <> 33 AND fn_users.user_news_letters = 1 AND user_invalid_email = 0 AND user_status = 1
GROUP BY fn_users.user_login;

 *
 * Остальные пользователи
 *
SELECT fn_users.user_id, fn_users.user_login, fn_users.user_code FROM fn_users
LEFT JOIN nr_codes ON nr_codes.code_activated_user_id = fn_users.user_id
LEFT JOIN nr_orders ON nr_orders.order_id = nr_codes.code_order_id
LEFT JOIN nr_package_order ON nr_package_order.po_or_id = nr_orders.order_id

LEFT JOIN (SELECT fn_users.user_id FROM fn_users
            LEFT JOIN nr_codes ON nr_codes.code_activated_user_id = fn_users.user_id
            LEFT JOIN nr_orders ON nr_orders.order_id = nr_codes.code_order_id
            LEFT JOIN nr_package_order ON nr_package_order.po_or_id = nr_orders.order_id
            WHERE nr_codes.code_is_active = 1 AND nr_package_order.po_pk_id <> 33 AND fn_users.user_news_letters = 1 AND user_invalid_email = 0 AND user_status = 1
            GROUP BY fn_users.user_login) AS paid ON paid.user_id = fn_users.user_id

WHERE paid.user_id IS NULL AND fn_users.user_news_letters = 1 AND user_invalid_email = 0 AND user_status = 1
GROUP BY fn_users.user_login;
*/

/**
 * Пути к массивам с пользователями. Массивы можно легко извлечь при экспорте из phpMyAdmin, выбрав опцию 'php array'
 */
const PAID_USERS_ARRAY_PATH = '/home/gutsout/Рабочий стол/paid.php';
const UNPAID_USERS_ARRAY_PATH = '/home/gutsout/Рабочий стол/unpaid.php';

/**
 * Каталог в котором будут лежать результирующие файлы, не забываем чтоб с правами было все ок
 */
const READY_FILES_DIR = '/home/gutsout/h/gos_sendbox/pg/normativka_users/files/';


ini_set('memory_limit', '-1');
$usersByTypes = [
    'paid' => require_once PAID_USERS_ARRAY_PATH,
    'unpaid' => require_once UNPAID_USERS_ARRAY_PATH,
];

$emails = [];
foreach ($usersByTypes as $typeOfUsers => $users) {
        $file = fopen(READY_FILES_DIR . $typeOfUsers, 'a');
        foreach ($users as $user) {
                $emails[$typeOfUsers][] = $user['user_login'];
                $signature = getSignature($user['user_id'], $user['user_code']);
                $string = "{$user['user_login']}\t{$signature}" . PHP_EOL;
                fwrite($file, $string);
        }
        fclose($file);
}
$doubles = array_intersect($emails['paid'], $emails['unpaid']);
if ($doubles) {
        echo '<img src="http://risovach.ru/upload/2014/06/mem/spanch-bob_53402241_orig_.jpg">';
        echo '<p style="color: #EF0113">Дубли e-mail-ов платных и бесплатных пользователей<p>';
        echo '<pre>'.print_r($doubles, true).'</pre>';
} else {
        echo '<img src="http://static02.rupor.sampo.ru/16111/1659577-fuck_yeah_super.jpg">';
        echo '<p style="color: #117E01"><strong>done</strong><p>';
}

function getSignature($userId, $userCode) {
        return preg_replace('#[/=+]#',
            '',
            base64_encode(md5(sprintf('(57f-%s-gh-%s-yy', $userId, $userCode) . 'fhGg46dksksfhj', true))
                . base64_encode(md5(sprintf('%s9s%swl', $userId, $userCode) . 'fhGg46dksksfhj', true)));
}