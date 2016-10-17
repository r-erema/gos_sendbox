<?php
namespace Foo\Bar\SubNamespace;

const FOO = 1;
function foo() {
    echo PHP_EOL . str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL .
        'Namespace: ' . __NAMESPACE__ . PHP_EOL .
        'Function: ' . __FUNCTION__ . PHP_EOL .
        str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL;
}
class foo {
    public static function statMethod() {
        echo PHP_EOL . str_repeat('=', strlen(__CLASS__)) . PHP_EOL .
            'Class: ' . __CLASS__ . PHP_EOL .
            'Namespace: ' . __NAMESPACE__ . PHP_EOL .
            'Method: ' . __METHOD__ . PHP_EOL .
            str_repeat('=', strlen(__CLASS__)) . PHP_EOL;
    }
}