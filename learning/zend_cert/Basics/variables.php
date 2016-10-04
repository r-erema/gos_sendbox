<?php

/*$a = $SZ = $_b = $c1 = null;

$var = 123;
var_dump($var);

$var = (string) $var;
var_dump($var);

$var = (array) $var;
var_dump($var);

$arr = ['name' => 'Matt', 'age' => 26, 'Job' => 'Real programmer'];
var_dump($arr);
$obj = (object) $arr;
var_dump($obj);
$obj->name = 'Matt I.';
$obj->age = 27;
$arr2 = (array) $obj;
var_dump($arr2);

$arr3 = [];
$obj2 = (object) $arr3;
var_dump(get_object_vars($obj2));

var_dump(intval('7suuuuuutr'));
var_dump(floatval(true));
var_dump(strval(true));
var_dump(boolval('0'));
$p = true;
settype($p, 'string');
var_dump($p);

var_dump(is_int(123));
var_dump(is_int(1.23));
var_dump(is_float(1.23));
var_dump(is_float(123));
var_dump(is_string('true'));
var_dump(is_string(true));
var_dump(is_bool(1));
var_dump(is_bool((bool) 1));
var_dump(is_null($k = null));
var_dump(is_null($p));
var_dump(is_array($arr3));
var_dump(is_null($obj2));
var_dump(is_object($obj2));
var_dump(is_object($arr3));

var_dump(is_numeric(null));
var_dump(is_numeric(123.332));
var_dump(is_numeric('32s'));
var_dump(is_numeric('32.54dg'));
var_dump(is_numeric(false));*/

/*$name = 'foo';
$$name = 'bar';
var_dump($foo);

$name = 123;
$$name = 'kek';
var_dump(${123});
var_dump(${'123'});*/

$arr = ['a', 'b', 7 => 14, false, 15 => true, null, 'prop' => false, '100', [54, 34, true]];
$obj = (object) $arr;
echo '<pre>';
print_r($arr);
print_r($obj);
var_dump($arr);
var_dump($obj);
var_export($arr);
var_export($obj);
echo '</pre>';

echo '<pre>';
debug_zval_dump(1);
debug_zval_dump(2);
echo '</pre>';

$k = null;
var_dump(isset($k));

const KKK = 7 > 2;