
<?php

/*
What is the output of the following code? class Number { private $v; private static $sv = 10;
public function __construct($v) { $this->v = $v; } public function mul() { return static function
($x) { return isset($this) ? $this->v*$x : self::$sv*$x; }; } } $one = new Number(1); $two =
new Number(2); $double = $two->mul(); $x = Closure::bind($double, null, 'Number'); echo

$x(5);

A.
5

B.
10

C.
50

D.
Fatal erro

Answer: C.
50

*/
echo '110. What is the output of the following code? class Number { private $v; private static $sv = 10;
public function __construct($v) { $this->v = $v; } public function mul() { return static function
($x) { return isset($this) ? $this->v*$x : self::$sv*$x; }; } } $one = new Number(1); $two =
new Number(2); $double = $two->mul(); $x = Closure::bind($double, null, \'Number\'); echo' . PHP_EOL;

class Number2 {
    private $v;
    private static $sv = 10;
    public function __construct($v) { $this->v = $v; }
    public function mul() {
        return static function ($x) {
            return isset($this) ? $this->v*$x : self::$sv*$x;
        };
    }
}

$one = new Number2(1);
$two = new Number2(2);
$double = $two->mul();
$x = Closure::bind($double, null, 'Number2');
echo $x(5);