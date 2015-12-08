<?php
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

$factory = new TerrianFactory(new EarthSea(-1), new EarthForest(), new EarthPlains());

print_r($factory->getSea());
print_r($factory->getForest());
print_r($factory->getPlains());

print_r('-----------------------------------------' . PHP_EOL);

$commsMgr = AppConfig::getInstance()->getCommsManager();
print($commsMgr->getApptEncoder()->encode());