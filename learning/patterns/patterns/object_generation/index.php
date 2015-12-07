<?php

use learning\patterns\patterns\object_generation\classes\createObjectInObject as createIn;
use learning\patterns\patterns\object_generation\classes\passObjectToObject as passTo;
use \learning\patterns\patterns\object_generation\classes as common;

spl_autoload_register(function ($class) {
    $root = __DIR__ . '/../../../../';
    $pathToClass = str_replace('\\', '/', $class) . '.php';
    require_once $root . $pathToClass;
});


$ciBoss = new createIn\NastyBoss();
$ciBoss->addEmployee('Игорь');
$ciBoss->addEmployee('Владимир');
$ciBoss->addEmployee('Мария');
$ciBoss->projectFails();

$ptBoss = new passTo\NastyBoss();
$ptBoss->addEmployee(new common\Minion("Игорь"));
$ptBoss->addEmployee(new common\CluedUp("Владимир"));
$ptBoss->addEmployee(new common\Minion("Мария"));
$ptBoss->projectFails();
$ptBoss->projectFails();
$ptBoss->projectFails();

$ptBoss2 = new passTo\NastyBoss();
$ptBoss2->addEmployee(common\Employee::recruit('Игорь'));
$ptBoss2->addEmployee(common\Employee::recruit('Владимир'));
$ptBoss2->addEmployee(common\Employee::recruit('Мария'));
$ptBoss2->projectFails();
$ptBoss2->projectFails();
$ptBoss2->projectFails();
