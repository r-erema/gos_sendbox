<?php
spl_autoload_register(function ($class) {
    require_once '/home/gutsout/h/gos_sendbox/learning/patterns/patterns/corp_applications_patterns/' . str_replace('\\', '/', $class) . '.php';
});

$reg = \Registry\Registry::getInstance();
echo $reg->getRequest()->getUrl();