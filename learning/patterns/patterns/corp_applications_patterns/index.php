<?php
spl_autoload_register(function ($class) {
    require_once '/home/gutsout/h/gos_sendbox/learning/patterns/patterns/corp_applications_patterns/' . str_replace('\\', '/', $class) . '.php';
});

$reg = \Registry\Registry::getInstance();
$reg->setRequest(new \Registry\Request('http://vk.com/api/'));
$request = $reg->getRequest();
include 'index2.php';