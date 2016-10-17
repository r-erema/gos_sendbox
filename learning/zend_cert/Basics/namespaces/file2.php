<?php
namespace Foo\Bar;
require_once __DIR__ . '/file1.php';
const FOO = 2;
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

foo();
foo::statMethod();
echo PHP_EOL . FOO . PHP_EOL;

SubNamespace\foo();
SubNamespace\foo::statMethod();
echo PHP_EOL . SubNamespace\FOO . PHP_EOL;

\Foo\Bar\foo();
\Foo\Bar\foo::statMethod();
echo PHP_EOL . \Foo\Bar\FOO . PHP_EOL;