<?php
namespace NameSpaceName;

class ClassName {
    /**
     * ClassName constructor.
     */
    public function __construct() {
        echo __METHOD__ . PHP_EOL;
    }
}

function funcName() {
    echo __FUNCTION__ . PHP_EOL;
}

const CONST_NAME = 'namespaced';

include __DIR__ . '/example1.php';

$a = 'ClassName';
$obj  = new $a;
$b = 'funcName';
$b();
echo constant('CONST_NAME');

$a = '\NameSpaceName\ClassName';
$obj  = new $a;
$a = 'NameSpaceName\ClassName';
$obj  = new $a;
$b = '\NameSpaceName\funcName';
$b();
$b = 'NameSpaceName\funcName';
$b();
echo constant('\NameSpaceName\CONST_NAME');
echo constant('NameSpaceName\CONST_NAME');
