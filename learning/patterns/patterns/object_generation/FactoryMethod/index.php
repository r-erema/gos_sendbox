<?php
    spl_autoload_register(function ($class) {
        if (!file_exists('/home/gutsout/h/gos_sendbox/' . str_replace('\\', '/', $class) . '.php')) {
            $class = 'classes/' . $class . '.php';
        } else {
            $class = '/home/gutsout/h/gos_sendbox/' . str_replace('\\', '/', $class) . '.php';
        }
        require_once $class;
    });

use learning\patterns\patterns\object_generation\FactoryMethod\classes\wrong as wrong;
use learning\patterns\patterns\object_generation\FactoryMethod\classes\wright as wright;

$comms = new wrong\CommsManager(wrong\CommsManager::MEGA);
$apptEncoder = $comms->getApptEncoder();
print $apptEncoder->encode();

print '=========================================' . PHP_EOL;

$mgr = new wright\BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encode();
print $mgr->getFooterText();