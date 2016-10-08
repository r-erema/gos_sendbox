<?php
/*namespace Foo\Bar;
include 'namespaces.php';

const FOO = 2;
function foo() {}
class foo {
	public static function statMethod(  ) {
		return __CLASS__;
	}
}
echo SubNamespace\foo::statMethod();
echo '<br>';
echo foo::statMethod();*/

namespace namespacename;
class classname
{
    function __construct()
    {
        echo __METHOD__,"\n";
    }
}
function funcname()
{
    echo __FUNCTION__,"\n";
}
const constname = "namespaced";

/*include 'namespaces.php';

echo '<pre>';
$a = 'classname';
$obj = new $a; // выводит classname::__construct
$b = 'funcname';
$b(); // выводит funcname
echo constant('constname'), "\n"; // выводит global


/* обратите внимание, что при использовании двойных кавычек символ обратного слэша должен быть заэкранирован. Например, "\\namespacename\\classname" */
/*$a = '\namespacename\classname';
$obj = new $a; // выводит namespacename\classname::__construct
$a = 'namespacename\classname';
$obj = new $a; // также выводит namespacename\classname::__construct
$b = 'namespacename\funcname';
$b(); // выводит namespacename\funcname
$b = '\namespacename\funcname';
$b(); // также выводит namespacename\funcname
echo constant('\namespacename\constname'), "\n"; // выводит namespaced
echo constant('namespacename\constname'), "\n"; // также выводит namespaced
echo '</pre>';*/

echo __NAMESPACE__;