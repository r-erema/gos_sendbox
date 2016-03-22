<?php
spl_autoload_register(function ($class) {
    require_once '/home/gutsout/h/gos_sendbox/learning/patterns/patterns/corp_applications_patterns/' . str_replace('\\', '/', $class) . '.php';
});

/*\woo\base\ApplicationRegistry::setDSN('DSN-Value');
$dsn = \woo\base\ApplicationRegistry::getDSN();*/

$controller = new \woo\controller\AddVenueController();
$controller->process();
var_dump($controller);
