<?php
/*
Consider the following two files. When you run test.php, what would the output look like?
test.php: include "MyString.php"; print ","; print strlen("Hello world!"); MyString.php:
namespace MyFramework\String; function strlen($str) { return \strlen($str)*2; // return
double the string length } print strlen("Hello world!")

A.
PHP Fatal error: Cannot redeclare strlen()

B.
12,24

C.
12,12

D.
24,12

E.
24,24

Answer: D
24,12

*/

echo '27. test.php: include "MyString.php"; print ","; print strlen("Hello world!"); MyString.php:
namespace MyFramework\String; function strlen($str) { return \strlen($str)*2; // return
double the string length } print strlen("Hello world!")' . PHP_EOL;
include '27_test.php';