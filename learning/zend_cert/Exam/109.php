
<?php

/*
What is the output of the following code? class Number { private $v = 0; public function
__construct($v) { $this->v = $v; } public function mul() { return function ($x) { return $this->v
* $x; }; } } $one = new Number(1); $two = new Number(2); $double =
$two->mul()->bindTo($one); echo $double(5);

A.
5

Answer: A.
5

*/
echo '109. What is the output of the following code? class Number { private $v = 0; public function
__construct($v) { $this->v = $v; } public function mul() { return function ($x) { return $this->v
* $x; }; } } $one = new Number(1); $two = new Number(2); $double =
$two->mul()->bindTo($one); echo $double(5);' . PHP_EOL;

class Number109 {
private $v = 0;
public function __construct($v) {
$this->v = $v;
}
public function mul() {
return function ($x) {
return $this->v * $x;
};
}
}

$one = new Number109(1);
$two = new Number109(2);
$double = $two->mul()->bindTo($one);

echo $double(5);