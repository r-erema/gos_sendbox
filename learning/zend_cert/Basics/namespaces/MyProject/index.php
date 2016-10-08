<?php
namespace {
    function connect() {echo 'Call function: ' . __FUNCTION__ . ', namespace: ' . __NAMESPACE__ . PHP_EOL;}/*
    function var_dump($arg) {echo 'Call function: ' . __FUNCTION__ .
                                  ', namespace: ' . __NAMESPACE__ . PHP_EOL .
                                  ', argument: ' . $arg . PHP_EOL;}*/
}

namespace MyProject {
    const CONNECT_OK = 1;
    class Connection {
        public function __construct() {
            echo 'Class ' . __CLASS__ . ' created' . PHP_EOL;
            echo 'Namespace: ' . __NAMESPACE__ . PHP_EOL;
        }
    }
    function connect() {echo 'Call function: ' . __FUNCTION__ . ', namespace: ' . __NAMESPACE__ . PHP_EOL;}
    function var_dump($arg) {echo 'Call function: ' . __FUNCTION__ .
                                  ', namespace: ' . __NAMESPACE__ .
                                  ', argument: ' . $arg . PHP_EOL;}
    var_dump(7);
    \var_dump(7);
    \MyProject\SubNamespace\var_dump(7);
}

namespace MyProject\SubNamespace {
    function var_dump($arg) {echo 'Call function: ' . __FUNCTION__ .
        ', namespace: ' . __NAMESPACE__ .
        ', argument: ' . $arg . PHP_EOL;}
}


namespace AnotherProject {
    const CONNECT_OK = 1;
    class Connection {
        public function __construct() {
            echo 'Class ' . __CLASS__ . ' created' . PHP_EOL;
            echo 'Namespace: ' . __NAMESPACE__ . PHP_EOL;
        }
    }
    function connect() {echo 'Call function: ' . __FUNCTION__ . ', namespace: ' . __NAMESPACE__ . PHP_EOL;}
    /*function var_dump($arg) {echo 'Call function: ' . __FUNCTION__ .
        ', namespace: ' . __NAMESPACE__ .
        ', argument: ' . $arg . PHP_EOL;}*/
}
