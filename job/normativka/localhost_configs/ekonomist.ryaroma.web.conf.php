<?php

/*define("DB_XHOST", "mysql.web");
define("DB_XUSER", "sites_db_access");
define("DB_XPASS", "bRNqWmZSn9e8wEZV");*/
define("DB_XHOST", "localhost");
define("DB_XUSER", "root");
define("DB_XPASS", "mmm_beer11");
define("DB_XNAME", "ekonomistby");
define("DB_XPREFIX", "fn_");
define("SET_NAMES", "utf8");

/*define("DB_NORMATIVKA_HOST", "mysql.web");
define("DB_NORMATIVKA_USER", "sites_db_access");
define("DB_NORMATIVKA_PASS", "bRNqWmZSn9e8wEZV");*/
define("DB_NORMATIVKA_HOST", "localhost");
define("DB_NORMATIVKA_USER", "root");
define("DB_NORMATIVKA_PASS", "mmm_beer11");
define("DB_NORMATIVKA_NAME", "normativkaby");

/*define("DB_BLOG_HOST", "mysql.web");
define("DB_BLOG_USER", "sites_db_access");
define("DB_BLOG_PASS", "bRNqWmZSn9e8wEZV");*/
define("DB_BLOG_HOST", "localhost");
define("DB_BLOG_USER", "root");
define("DB_BLOG_PASS", "mmm_beer11");
define("DB_BLOG_NAME", "blog");
define("BLOG_API_URL", "http://normativka.ryaroma.web:80/blog/api/auth/");
define("HAS_BLOG", (bool)'0');

define("MEMCACHE_SERVER", "localhost");
define("MEMCACHE_PORT", '11211');
define("MEMCACHE_NAMESPACE", 'ekonomist.by');
define("MEMCACHE_ACTIVE", (bool)'0');

define("SITE_ALIAS", "ekonomist.ryaroma.web");
define("ABSOLUTE_PATH", '/home/gutsout/h/normativka/portal/');

define("USER_DOCS_PATH", '/home/gutsout/h/normativka/var/user_data/user_docs');
define("AVATARS_PATH", '/home/gutsout/h/normativka/var/user_data/avatars');
define("SHARED_DOCS_PATH", '/home/gutsout/h/normativka/var/user_data/shared_docs/ekonomist');
define("SITE_NAMESPACE", 'ekonomist');

define("TEMPLATE_DIR", "__templates/");
define("TEMPLATE_COMPILE_DIR", "/home/gutsout/h/normativka/var/templates_compiled/ekonomist.ryaroma.web/");
define("TPL_DIR_ADMIN", "Acp/");
define("TPL_DIR_SITE", "ekonomist.by/");

define("SITE_PASSPORT_ID", (int)'3');

define("EMAIL_VALIDATION", (bool)'1');
define("TIME_ZONE", "Europe/Minsk");// Europe/Minsk Asia/Kabul
define('COMPANY_NAME', '«Профигруп»');
define('BODY_CHARS_COUNT', 10000); // если вывод модуля меньше, то вывести дополнительный блок (чтобы занять пустое место). если false -- ничего не покажется.

define("PHOTOGALLERY_DIR", '/home/gutsout/h/normativka/var/user_data/photos/ekonomist');
define("NEWS_IMAGE_DIR", '/home/gutsout/h/normativka/var/site_data/pictures/ekonomist/news/');
define("MAGARTICLES_IMAGE_DIR", '/home/gutsout/h/normativka/var/site_data/pictures/ekonomist/magazine-articles/');

define("STATS_PATH", '/home/gutsout/h/normativka/var/site_data/stats');

define("DEBUG_LEVEL", (int)'2');
define("ANTISPAM", (bool)'1');
define("TOPIC_COUNTRIES", false); // атавизм
define("LAST_TOPICS_STOP_RUBRIC_ID", '27'); // не показывать сообщения из данных рубрик в списке на главной форума (можно через запятую, например: '11,12,33')

$profInfoServerPrefix = 'http://pi-test2.web';
define("PROFINFO_SERVICE_URL", "$profInfoServerPrefix/ProfInfo/ProfInfoService/ProfInfoService.asmx?wsdl");
define("PROFINFO_USERS_SERVICE_URL", "$profInfoServerPrefix/ProfInfo/ProfInfoService/UserEditor.asmx?wsdl");
define("PROFINFO_WEB_API_URL", "$profInfoServerPrefix/ProfInfo/Normativka.WebApi/api/");
define("FORUM_SEARCH_SERVICE_URL", "$profInfoServerPrefix/ProfInfo/WebServices/ForumsWebService.asmx?wsdl");
define("FORUM_SEARCH_SERVICE_NAMESPACE", DB_XNAME);
define("PROFINFO_SERVICE_CONNECTION_TIMEOUT", (int)'20000');
define("PROFINFO_SERVICE_RECEIVE_TIMEOUT", (int)'20000');

define("SEMINARS_SERVICE_URL", 'http://prof.by/upcoming-events.js');

define("INFO_SERVICE_URL", "http://nr.commontools.net/data-center/infoservice/service.xml-rpc");

define("PDF_SERVICE_URL", "http://pi.commontools.net/AsposeWordConvertService/api/Converter");

define('QA_SERVICE_URL', 'http://pgfb.profigroup.by:22385/QaService.asmx?wsdl');

const SMS_SMS_GATEWAY = 'info-bip';
const SMS_CONFIG = [
    'smsp' => [
        'url' => 'https://cp.smsp.by?r=api/msg_send&user=webdev@commontools.net&apikey=061d9e3x4r&recipients=%%phone_number%%&message=%%message%%&sender=Normativka&urgent=1',
    ],
    'info-bip' => [
        'sender-name' => 'Normativka',
        'api-key' => '9387d934add82d3a2deac321dfb68426-b54e3348-971e-4480-899b-67c805b08341',
    ],
];

define("EXCHANGE_RATES_DB", 'mysql://sites_db_access:bRNqWmZSn9e8wEZV@mysql.web/buhgalterby');

define("WEBPAY_STORE_ID", '529668877');
define("WEBPAY_STORE_NAME", 'Экономист.by');

define("SMTP_EMAIL", "box@normativka.by");
define("SMTP_HOST_PORT", "smtp.yandex.com:465");
define("SMTP_LOGIN", "nr-test-srv@commontools.net");
define("SMTP_PASSWORD", "gwJKd3ghlb");
define("SMTP_AUTH", "login");
define("SMTP_SSL", "login");
define("f", "0");

if (isset($_SERVER['HTTP_HTTPS']) && $_SERVER['HTTP_HTTPS'] == 'on'
    || isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'
) {
    define("WWW_URL", "https://ekonomist.ryaroma.web");
    define("PROTOCOL", "https://");
} else {
    define("WWW_URL", "https://ekonomist.ryaroma.web");
    define("PROTOCOL", "http://");
}

$nSites = array(
    '0' => array(
        "SITE_NAME" => "Нормативка.by",
        "SITE_URL" => "normativka.by",
        /*"DB_HOST" => "mysql.web",
        "DB_USER" => "sites_db_access",
        "DB_PASS" => "bRNqWmZSn9e8wEZV",*/
        "DB_HOST" => "localhost",
        "DB_USER" => "root",
        "DB_PASS" => "mmm_beer11",
        "DB_NAME" => "normativkaby",
        "DB_PREFIX" => "fn_",
        "SET_NAMES" => "utf8",
        "PACKAGES" => array(100,101,102,103,110,111,112,113,120,121,122,123,130,131,132,133,140,141,142,143,300,301,302,303,304,400,401,402,403,404,800,900)
    ),

    '1' => array(
        "SITE_NAME" => "Бухгалтер.by",
        "SITE_URL" => "buhgalter.by",
        /*"DB_HOST" => "mysql.web",
        "DB_USER" => "sites_db_access",
        "DB_PASS" => "bRNqWmZSn9e8wEZV",*/
        "DB_HOST" => "localhost",
        "DB_USER" => "root",
        "DB_PASS" => "mmm_beer11",
        "DB_NAME" => "buhgalterby",
        "DB_PREFIX" => "fn_",
        "SET_NAMES" => "utf8",
        "PACKAGES" => array(100,101,102,103,300,301,302,400,800,900)
    ),

    '2' => array(
        "SITE_NAME" => "Кадровик.by",
        "SITE_URL" => "kadrovik.by",
        /*"DB_HOST" => "mysql.web",
        "DB_USER" => "sites_db_access",
        "DB_PASS" => "bRNqWmZSn9e8wEZV",*/
        "DB_HOST" => "localhost",
        "DB_USER" => "root",
        "DB_PASS" => "mmm_beer11",
        "DB_NAME" => "kadrovikby",
        "DB_PREFIX" => "fn_",
        "SET_NAMES" => "utf8",
        "PACKAGES" => array(110,111,112,113,300,301,303,400,800,900)
    ),

    '3' => array(
        "SITE_NAME" => "Экономист.by",
        "SITE_URL" => "ekonomist.by",
        /*"DB_HOST" => "mysql.web",
        "DB_USER" => "sites_db_access",
        "DB_PASS" => "bRNqWmZSn9e8wEZV",*/
        "DB_HOST" => "localhost",
        "DB_USER" => "root",
        "DB_PASS" => "mmm_beer11",
        "DB_NAME" => "ekonomistby",
        "DB_PREFIX" => "fn_",
        "SET_NAMES" => "utf8",
        "PACKAGES" => array(100,101,102,103,300,301,302,400,800,900)
    ),

    '4' => array(
        "SITE_NAME" => "Юрисконсульт.by",
        "SITE_URL" => "jurisconsult.by",
        /*"DB_HOST" => "mysql.web",
        "DB_USER" => "sites_db_access",
        "DB_PASS" => "bRNqWmZSn9e8wEZV",*/
        "DB_HOST" => "localhost",
        "DB_USER" => "root",
        "DB_PASS" => "mmm_beer11",
        "DB_NAME" => "jurisconsultby",
        "DB_PREFIX" => "fn_",
        "SET_NAMES" => "utf8",
        "PACKAGES" => array(120,121,122,123,300,301,304,400,800,900)
    ),
);

return require("system.conf.php");
