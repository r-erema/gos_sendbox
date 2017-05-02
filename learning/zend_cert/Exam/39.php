
<?php
/*
How should class MyObject be defined for the following code to work properly? Assume
$array is an array and MyObject is a user-defined class. $obj = new MyObject();
array_walk($array, $obj);

A.
MyObject should extend class Closure

B.
MyObject should implement interface Callable

C.
MyObject should implement method __call

D.
MyObject should implement method __invoke

Answer: D
MyObject should implement method __invoke

*/

echo '39. How should class MyObject be defined for the following code to work properly? Assume
$array is an array and MyObject is a user-defined class. $obj = new MyObject(); array_walk($array, $obj);' . PHP_EOL;

class MyObject_ {
    public $t = 1;
    public function __invoke()
    {
        echo 'invoked' . PHP_EOL;
    }
}
$obj = new MyObject_();
//$obj(1);
$array = [];
@array_walk($array, $obj());