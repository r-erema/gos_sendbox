<?php

#if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
#	header('Location: https://uchet.by' . $_SERVER['REQUEST_URI']);

#http://zp.by/
define("DB_XHOST", "localhost");
define("DB_XUSER", "root");
define("DB_XPASS", "mmm_beer11");
#define("DB_XHOST", "mysql.web");
#define("DB_XUSER", "root");
#define("DB_XPASS", "neumen24Pos");

define("DB_XNAME", "peomagby");
define("DB_XPREFIX", "mag_");
define("SET_NAMES", "cp1251");

define("MEMCACHE_SERVER", "localhost");
define("MEMCACHE_PORT", 11211);
define("MEMCACHE_NAMESPACE", 'peomag.by');
define("MEMCACHE_ACTIVE", true);

define("WWW_URL", "http://peo.ryaroma.web");
define("SITE_ALIAS", "peomag.by");
define("ABSOLUTE_PATH", '/home/gutsout/h/magby/');
define("TEMPLATE_DIR", "__templates/");
define("TEMPLATE_COMPILE_DIR", 'compile_templates/templates_'.SITE_ALIAS);
define("COMPILE_DIR", "__templates/");
define("TPL_DIR_ADMIN", "Acp/");
#define("GEO_IP_PATH", "__core/libExt/geoip/getinfo.class.php");
define("TEMP_DIR", "/tmp/");
define("TIME_ZONE", "Europe/Minsk");

define("TPL_DIR_SITE", "peomag.by/");
define("FILES_PATH", ABSOLUTE_PATH.'files');

define("PICTURE_PATH", ABSOLUTE_PATH.'pictures');

define("GALLERY_01",PICTURE_PATH);
define("GALLERY_TEMP", PICTURE_PATH.'/temp');
define("NEWS_IMAGE_DIR", PICTURE_PATH.'/news/');
define("NUMBERS_IMAGE_DIR", PICTURE_PATH.'/numbers/');
define("DOCS_BANK_FILES_DIR", FILES_PATH.'/docs-bank/');
define("DOWNLOADS_FILES_DIR", FILES_PATH.'/downloads/');
define("DOWNLOADS_IMAGE_DIR", PICTURE_PATH.'/downloads/');
define("PROJECTS_IMAGE_DIR", PICTURE_PATH.'/projects/');
define("AUTORS_PHOTO_IMAGE_DIR", PICTURE_PATH.'/photo/');

define("DEBUG_LEVEL", 1);
define("ANTISPAM", true);

define("INFO_SERVICE_URL", "http://nr.commontools.net/data-center/infoservice/service.xml-rpc");
define("YANDEX_SERVER_HOST", "srv.commontools.net");
define("YANDEX_SERVER_PORT", 17000);

include("system.conf.php");

?>