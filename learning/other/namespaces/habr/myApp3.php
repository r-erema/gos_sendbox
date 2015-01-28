<?php
namespace App\Lib1;
use App\Lib1 as Lib;
use App\Lib2\myClass as Cls;

require_once 'lib1.php';
require_once 'lib2.php';
echo Lib\MYCONST . "\n";
echo Lib\myFunction() . "\n";
echo Lib\myClass::WhoAmI() . "\n";
echo Cls::WhoAmI() . "\n";
$a = __NAMESPACE__;
new $a;
