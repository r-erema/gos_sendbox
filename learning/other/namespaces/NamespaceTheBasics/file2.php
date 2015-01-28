<?php
namespace Foo\Bar;
include 'file1.php';

const FOO = "2 namespace Foo\\Bar<br>";
function foo() {echo "foo(): namespace Foo\\Bar<br>";}
class foo {
	static function staticMethod() {echo "staticMethod(): namespace Foo\\Bar<br>";}
}

foo();
foo::staticMethod();
echo FOO;

subnamespace\foo();
subnamespace\foo::staticMethod();
echo subnamespace\FOO;

\Foo\Bar\foo();
\Foo\Bar\foo::staticmethod();
echo \Foo\Bar\FOO;

namespace Foo;

function strlen($str) {
	return $str;
}
const INI_ALL = 3;
class Exception{
	public function __construct() {
		echo __CLASS__;
	}
}
var_dump(new Exception);