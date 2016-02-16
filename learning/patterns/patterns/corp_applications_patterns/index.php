<?php
spl_autoload_register(function ($class) {
    require_once '/home/gutsout/h/gos_sendbox/learning/patterns/patterns/corp_applications_patterns/' . str_replace('\\', '/', $class) . '.php';
});

$reg = \Registry\Registry::getInstance();
var_dump(get_class($reg));
Registry\Registry::testMode();
$reg = \Registry\Registry::getInstance();
var_dump(get_class($reg));
$reg = \Registry\Registry::getInstance();
var_dump(get_class($reg));
Registry\Registry::testMode();
$reg = \Registry\Registry::getInstance();
var_dump(get_class($reg));
\Registry\Registry::testMode(false);
$reg = \Registry\Registry::getInstance();
var_dump(get_class($reg));