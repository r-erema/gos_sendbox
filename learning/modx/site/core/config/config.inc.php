<?php
/**
 *  MODX Configuration file
 */
$database_type = 'mysql';
$database_server = 'localhost';
$database_user = 'modx_user';
$database_password = '3s8Zw3zMynVj8pPa';
$database_connection_charset = 'utf8';
$dbase = 'test';
$table_prefix = 'modx_';
$database_dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
$config_options = array (
);
$driver_options = array (
);

$lastInstallTime = 1435649758;

$site_id = 'modx559246de647981.95963597';
$site_sessionname = 'SN559245b855506';
$https_port = '443';
$uuid = '2e9923b4-c8e5-4e11-b53d-49b5740f2513';

if (!defined('MODX_CORE_PATH')) {
    $modx_core_path= '/home/gutsout/h/gos_sendbox/learning/modx/site/core/';
    define('MODX_CORE_PATH', $modx_core_path);
}
if (!defined('MODX_PROCESSORS_PATH')) {
    $modx_processors_path= '/home/gutsout/h/gos_sendbox/learning/modx/site/core/model/modx/processors/';
    define('MODX_PROCESSORS_PATH', $modx_processors_path);
}
if (!defined('MODX_CONNECTORS_PATH')) {
    $modx_connectors_path= '/home/gutsout/h/gos_sendbox/learning/modx/site/connectors/';
    $modx_connectors_url= '/learning/modx/site/connectors/';
    define('MODX_CONNECTORS_PATH', $modx_connectors_path);
    define('MODX_CONNECTORS_URL', $modx_connectors_url);
}
if (!defined('MODX_MANAGER_PATH')) {
    $modx_manager_path= '/home/gutsout/h/gos_sendbox/learning/modx/site/manager/';
    $modx_manager_url= '/learning/modx/site/manager/';
    define('MODX_MANAGER_PATH', $modx_manager_path);
    define('MODX_MANAGER_URL', $modx_manager_url);
}
if (!defined('MODX_BASE_PATH')) {
    $modx_base_path= '/home/gutsout/h/gos_sendbox/learning/modx/site/';
    $modx_base_url= '/learning/modx/site/';
    define('MODX_BASE_PATH', $modx_base_path);
    define('MODX_BASE_URL', $modx_base_url);
}
if(defined('PHP_SAPI') && (PHP_SAPI == "cli" || PHP_SAPI == "embed")) {
    $isSecureRequest = false;
} else {
    $isSecureRequest = ((isset ($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') || $_SERVER['SERVER_PORT'] == $https_port);
}
if (!defined('MODX_URL_SCHEME')) {
    $url_scheme=  $isSecureRequest ? 'https://' : 'http://';
    define('MODX_URL_SCHEME', $url_scheme);
}
if (!defined('MODX_HTTP_HOST')) {
    if(defined('PHP_SAPI') && (PHP_SAPI == "cli" || PHP_SAPI == "embed")) {
        $http_host='gutsout.web';
        define('MODX_HTTP_HOST', $http_host);
    } else {
        $http_host= array_key_exists('HTTP_HOST', $_SERVER) ? $_SERVER['HTTP_HOST'] : 'gutsout.web';
        if ($_SERVER['SERVER_PORT'] != 80) {
            $http_host= str_replace(':' . $_SERVER['SERVER_PORT'], '', $http_host); // remove port from HTTP_HOST
        }
        $http_host .= ($_SERVER['SERVER_PORT'] == 80 || $isSecureRequest) ? '' : ':' . $_SERVER['SERVER_PORT'];
        define('MODX_HTTP_HOST', $http_host);
    }
}
if (!defined('MODX_SITE_URL')) {
    $site_url= $url_scheme . $http_host . MODX_BASE_URL;
    define('MODX_SITE_URL', $site_url);
}
if (!defined('MODX_ASSETS_PATH')) {
    $modx_assets_path= '/home/gutsout/h/gos_sendbox/learning/modx/site/assets/';
    $modx_assets_url= '/learning/modx/site/assets/';
    define('MODX_ASSETS_PATH', $modx_assets_path);
    define('MODX_ASSETS_URL', $modx_assets_url);
}
if (!defined('MODX_LOG_LEVEL_FATAL')) {
    define('MODX_LOG_LEVEL_FATAL', 0);
    define('MODX_LOG_LEVEL_ERROR', 1);
    define('MODX_LOG_LEVEL_WARN', 2);
    define('MODX_LOG_LEVEL_INFO', 3);
    define('MODX_LOG_LEVEL_DEBUG', 4);
}
if (!defined('MODX_CACHE_DISABLED')) {
    $modx_cache_disabled= false;
    define('MODX_CACHE_DISABLED', $modx_cache_disabled);
}
