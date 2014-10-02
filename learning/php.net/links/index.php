<meta charset="UTF-8">
<?php
/*
	# $a и $b указыват на одно занчение(null), при этом $a всегда указывает на то же значение что и $b, но никак не драуг на друга
	$a =& $b;
	var_dump($a);
	var_dump($b);
	$b = 15;
	var_dump($a);
	var_dump($b);
	unset($b);
	var_dump($a);
*/

/*
	$a = 'test';
	foo($a);
	var_dump($a);
*/

/*
	$b = [];
	foo($b['b']);
	var_dump(array_key_exists('b', $b));
	var_dump($b['b']);
*/

/*
$c = new StdClass;
var_dump(property_exists($c, 'd'));
foo($c->d);
var_dump(property_exists($c, 'd'));
*/
function foo(&$var) {}
?>

<h3>Присвоение ссылок глобальным переменным внутри функции</h3>
<?php
$var1 = 'Example variable';
$var2 = '';

function global_references($use_globals) {
	global $var1, $var2;
	if(!$use_globals) {
		$var2 =& $var1;
	} else {
		$GLOBALS['var2'] =& $var1;
	}
}

global_references(false);
echo "Значение var2: $var2<br>";
global_references(true);
echo "Значение var2: $var2<br>";
?>

<hr>
<h3>Ссылки и foreach</h3>
<p>При использовании переменной-ссылки в foreach, изменяется содержание, на которое она ссылается.</p>
<?php
	$ref = 0;
	$row =& $ref;
	foreach([1,2,3] as $row) {

	}
	echo $ref;
?>

<hr>
<h3>Ссылки и массивы</h3>
<?php
	$a = 1;
	$b = [2,3];
	$arr = [&$a, &$b[0], &$b[1]];
	var_dump($arr);
	$arr[0] = 5;
	var_dump($arr);
	var_dump($a);

	$arr = [8];
	$a =& $arr[0];
	var_dump($a);
	$arr[0] = 9;
	var_dump($a);
	$arr2 = $arr;
	var_dump($arr2);
	$arr2[0] = 54;
	var_dump($a);
?>

<hr>
<h3>Ссылки не являются указателями</h3>
<?php
	$baz = 1;
	function foo2(&$var) {
		$var =& $GLOBALS['baz'];
	}
	foo2($bar);
	var_dump($bar);
?>

<hr>
<h3>Передача по ссылке</h3>
<?php
	$o = new StdClass;
	$o->attr = 3;
	var_dump($o);
	var_dump(foo3($o));
	function foo3($obj) {
		$obj->attr = 13;
		return $obj;
	}
?>

<hr>
<h3>Ссылки, возвращаемые функцией</h3>
<?php
foo4(bar());
function foo4(&$var) {
	$var++;
}
function &bar() {
	$a = 99;
	return $a;
}
?>

<hr>
<h3>Возвращение по ссылке</h3>
<?php
	class foo {
		public  $value = 42;

		public function &getValue() {
			return $this->value;
		}
	}

	$obj = new foo();
	$myVal = &$obj->getValue();
	$obj->value = 3;
	echo $myVal;
?>

<hr>
<h3>Сброс переменных-ссылок</h3>
<?php
	$k = 1;
	$l =& $k;
	var_dump($l);
	$k = 7;
	var_dump($l);
	unset($k);
	var_dump($l);
	$k = 4;
	var_dump($l);
	$l &= $k;
	var_dump($l);
?>