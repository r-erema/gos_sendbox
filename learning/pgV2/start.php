<?php

include __DIR__ .'/vendor/frameworks/go/Registry.php';
include __DIR__ .'/vendor/frameworks/go/RegistryException.php';

$registry = \gofw\Registry::getInstance();
try {
    echo \gofw\Registry::getInstance()->set('user.name', 'Matt');
} catch (Exception $e) {
    echo $e->getMessage();
}
