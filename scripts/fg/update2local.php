<?php
$config = require_once 'config.php';

echo "1.{$config['absolute_root_path']}/core/config/config.inc.php generating..." . PHP_EOL;
$configText = file_get_contents('config.inc.tpl');
$configText = str_replace(
    [
        '%%db_server%%',
        '%%db_user%%',
        '%%db_pass%%',
        '%%db_name%%',
        '%%absolute_root_path%%'
    ],
    [
        $config['db_server'],
        $config['db_user'],
        $config['db_pass'],
        $config['db_name'],
        $config['absolute_root_path']
    ],
    $configText
);
file_put_contents("{$config['absolute_root_path']}/core/config/config.inc.php", $configText);

/*echo "2.{$config['db_dump_path']}/core/config/config.inc.php dump uploading..." . PHP_EOL;
`mysql -u{$config['db_user']} -p{$config['db_pass']} {$config['db_name']} < "{$config['db_dump_path']}"`;*/

echo "3.{$config['absolute_root_path']}/.htaccess generating..." . PHP_EOL;
$htaccessTxt = file_get_contents('htaccess.tpl');
$htaccessTxt = str_replace(
    [
        '%%domain_ru%%',
        '%%domain_com%%',
        '%%domain_ru_regexp%%',
        '%%domain_com_regexp%%'
    ],
    [
        $config['domain_ru'],
        $config['domain_com'],
        str_replace('.', '\.', $config['domain_ru']),
        str_replace('.', '\.', $config['domain_com'])
    ],
    $htaccessTxt
);
file_put_contents("{$config['absolute_root_path']}/.htaccess", $htaccessTxt);


/*echo "4.{$config['absolute_root_path']}/core/cache updating..." . PHP_EOL;
`rm -rf {$config['absolute_root_path']}/core/cache/*`;
`chown www-data:www-data {$config['absolute_root_path']}/core/cache`;*/

echo '5.DB config updating...' . PHP_EOL;
/** @var PDO $db */
$db = require_once 'db.php';
$db->prepare('UPDATE `modx_context_setting` SET `value` = ? WHERE `context_key` = "web" AND `key` = "site_url"')->execute(["https://{$config['domain_ru']}/"]);
$db->prepare('UPDATE `modx_context_setting` SET `value` = ? WHERE `context_key` = "en" AND `key` = "site_url"')->execute(["https://{$config['domain_com']}/"]);

$db->prepare('UPDATE `modx_system_settings` SET `value` = ? WHERE `key` = "mail_smtp_auth"')->execute([1]);
$db->prepare('UPDATE `modx_system_settings` SET `value` = ? WHERE `key` = "mail_smtp_hosts"')->execute([$config['mail_smtp_hosts']]);
$db->prepare('UPDATE `modx_system_settings` SET `value` = ? WHERE `key` = "mail_smtp_pass"')->execute([$config['mail_smtp_pass']]);
$stmt = $db->prepare('UPDATE `modx_system_settings` SET `value` = ? WHERE `key` = "mail_smtp_port"')->execute([$config['mail_smtp_port']]);
$stmt = $db->prepare('UPDATE `modx_system_settings` SET `value` = ? WHERE `key` = "mail_smtp_user"')->execute([$config['mail_smtp_user']]);

echo 'done' . PHP_EOL;