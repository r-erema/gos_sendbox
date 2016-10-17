<?php

require_once __DIR__ . '/MyProject/index.php';
require_once __DIR__ . '/MyProject2/index.php';

/*spl_autoload_register(function ($class) {
    $classParts = explode('\\', $class);
    $classNameIndexPart = count($classParts) - 1;
    unset($classParts[$classNameIndexPart]);
    $path = implode(DIRECTORY_SEPARATOR, $classParts);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $path . '/index.php';
});*/


new \MyProject\Connection();
new \MyProject\Connection2();
echo PHP_EOL;

/*MyProject\var_dump(4);
AnotherProject\var_dump(4);
var_dump(4);*/

