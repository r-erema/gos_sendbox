<?php
/*require_once 'lib1.php';
require_once 'lib2.php';
echo \App\Lib1\MYCONST."\n";
echo \App\Lib2\myFunction()."\n";
echo \App\Lib1\myClass::WhoAmI()."\n";*/

use App\Lib1\myClass as MC;
$obj = new MC();
echo $obj->WhoAmI();

function __autoload($className) {
	$className = "classes/" . str_replace("\\", '/', $className) . ".php";
	require_once($className);
}