
<?php

/*
Given a PHP value, which sample shows how to convert the value to JSON?

A.
$value = (object) $value; $string = $value->__toJson();

B.
$string = json_encode($value);

C.
$string = Json::encode($value);

D.
$json = new Json($value); $string = $json->__toString();

Answer: B.
$string = json_encode($value);

*/
echo '55. Given a PHP value, which sample shows how to convert the value to JSON?' . PHP_EOL;
echo '$string = json_encode($value);' . PHP_EOL;
