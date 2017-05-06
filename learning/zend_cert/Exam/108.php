
<?php

/*
What is the output of the following code? class A { public $a = 1; public function
__construct($a) { $this->a = $a; } public function mul() { return function($x) { return
$this->a*$x; }; } } $a = new A(2); $a->mul = function($x) { return $x*$x; }; $m = $a->mul();
echo $m(3);

A.
9

B.
3

C.
6

D.
0

Answer: C.
6

*/
echo '108. What is the output of the following code? class A { public $a = 1; public function
__construct($a) { $this->a = $a; } public function mul() { return function($x) { return
$this->a*$x; }; } } $a = new A(2); $a->mul = function($x) { return $x*$x; }; $m = $a->mul();
echo $m(3);' . PHP_EOL;

class A108 {
    public $a = 1;
    public function __construct($a) {
        $this->a = $a;
    }
    public function mul() {
        return function($x) {
            return $this->a*$x;
        };
    }
}

$a = new A108(2);
$a->mul = function($x) { return $x*$x; };
$m = $a->mul();
echo $m(3);