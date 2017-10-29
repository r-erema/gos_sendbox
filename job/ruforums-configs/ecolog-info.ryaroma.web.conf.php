<?php

define("DB_XHOST", "service.web");
define("DB_XUSER", "root");
define("DB_XPASS", "neumen24Pos");
define("DB_XNAME", "ecologinforu");
define("DB_XPREFIX", "fn_");
define("SET_NAMES", "utf8");

define("MEMCACHE_SERVER", "localhost");
define("MEMCACHE_PORT", 11211);
define("MEMCACHE_NAMESPACE", 'ecolog-info.ru');
define("MEMCACHE_ACTIVE", true);

define("SITE_ALIAS", "ecolog-info.ru");
define("ABSOLUTE_PATH", '/home/gutsout/h/forums-ru/');
define("TEMPLATE_DIR", "__templates/");
define("TPL_DIR_ADMIN", "Acp/");
define("TPL_DIR_SITE", "ecolog-info.ru/");
define("WWW_URL", "https://ecolog-info.ryaroma.web");
define("TEMP_DIR", "../temp/");
define("TIME_ZONE", "Europe/Moscow");
define("EMAIL_VALIDATION" , true);

define("TEMPLATE_COMPILE_DIR" , ABSOLUTE_PATH . 'templates_compiled/');

define("GALLERY_01", "/pictures");
define("GALLERY_TEMP", ABSOLUTE_PATH.'/pictures/temp');
define("NEWS_IMAGE_DIR", ABSOLUTE_PATH.'pictures/news/');
define("MAGARTICLES_IMAGE_DIR" , ABSOLUTE_PATH.'pictures/magazine-articles/');
define("PHOTOGALLERY_DIR" , ABSOLUTE_PATH.'photo/');

define('COMPANY_NAME', 'журнала «Справочник эколога»');
define('BODY_CHARS_COUNT', 10000); // если вывод модуля меньше, то вывести дополнительный блок (чтобы занять пустое место). если false -- ничего не покажется.
define('LOAD_UPLOADED_FILES', 0); // подгружать ли библиотеку по обмену файлами. сделано, чтобы не делать лесять копий главного файла.

define("DEBUG_LEVEL", 1);
define("ANTISPAM", true);
define("TOPIC_COUNTRIES", false);
define("LAST_TOPICS_STOP_RUBRIC_ID", 14);
define("SEARCH_SERVICE_URL", "http://pi.commontools.net/ProfInfo/WebServices/ForumsWebService.asmx?wsdl");

include("system.conf.php");

?>