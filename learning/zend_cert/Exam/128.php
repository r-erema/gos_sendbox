
<?php

/*
What is the output of the following code? class test { public $value = 0; function test() {
$this->value = 1; } function __construct() { $this->value = 2; } } $object = new test(); echo
$object->value;

A.
3

B.
No Output, PHP will generate an error message.

C.
1

D.
2

E.
0

Answer: D.
2

*/
echo '128. What is the output of the following code? class test { public $value = 0; function test() {
$this->value = 1; } function __construct() { $this->value = 2; } } $object = new test(); echo
$object->value;' . PHP_EOL;

class test128 {
    public $value = 0;
    function test() {
        $this->value = 1;
    }
    function __construct() {
        $this->value = 2; }
}
$object = new test128();
echo $object->value;