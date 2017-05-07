
<?php

/*
Given the following code, what is correct? function f(stdClass &$x = NULL) { $x = 42; } $z =
new stdClass; f($z); var_dump($z);

A.
Error: Typehints cannot be NULL

B.
Error: Typehints cannot be references

C.
Result is NULL

D.
Result is object of type stdClass

E.
Result is 42

Answer: E.
Result is 42

*/
echo '133. Given the following code, what is correct? function f(stdClass &$x = NULL) { $x = 42; } $z =
new stdClass; f($z); var_dump($z);' . PHP_EOL;

function f(stdClass &$x = NULL) {
    $x = 42;
}
$z = new stdClass;
f($z);
var_dump($z);