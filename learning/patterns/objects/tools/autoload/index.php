<?php

/*function __autoload($className) {
    include_once __DIR__ . "/../../basics/$className.php";
}*/

function __autoload($className) {
    var_dump($className);

    if(preg_match('/\\\\/', $className, $matches)) {
        var_dump($className);
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    } else {
        $path = str_replace('_', DIRECTORY_SEPARATOR, $className);
    }
    var_dump($path);
    var_dump($matches);
    require_once "../$path.php";
}

//$p = new Product('Book', 5);
echo \namespaces\Test::getNS();
