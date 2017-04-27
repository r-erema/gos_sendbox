
<?php
/*
What is the output of the following code? class C { public $x = 1; function __construct() {
++$this->x; } function __invoke() { return ++$this->x; } function __toString() { return (string)
–$this->x; } } $obj = new C(); echo $obj();

A.
1

B.
2

C.
3

D.
0

Answer: C
3

*/

echo '31. What is the output of the following code? class C { public $x = 1; function __construct() {
++$this->x; } function __invoke() { return ++$this->x; } function __toString() { return (string)
–$this->x; } } $obj = new C(); echo $obj();' . PHP_EOL;
class CC {
    public $x = 1;
    function __construct() {
        ++$this->x;
    }
    function __invoke() {
        return ++$this->x;
    }
    function __toString() {
        return (string) $this->x;
    }
}

$obj = new CC ();
echo $obj();