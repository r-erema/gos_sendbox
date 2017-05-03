
<?php

/*
Given a JSON-encoded string, which code sample correctly indicates how to decode the
string to native PHP values?

A.
$value = Json::fromJson($jsonValue);

B.
$value = json_decode($jsonValue);

C.
$json = new Json($jsonValue); $value = $json->decode();

D.
$value = Json::decode($jsonValue);

Answer: D.
$value = Json::decode($jsonValue);
*/
echo '56. Given a JSON-encoded string, which code sample correctly indicates how to decode the string to native PHP values?' . PHP_EOL;
echo '$value = json_decode($jsonValue);' . PHP_EOL;
