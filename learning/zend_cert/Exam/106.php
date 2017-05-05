
<?php

/*
In the following code, which line should be changed so it outputs the number 2

A.
No changes needed, the code would output 2 as is

B.
Line A, to: protected &$x = array();

C.
Line B, to: public function &getX() {

D.
Line C, to: return &$this->x;

E.
Line D, to: $a =& new A();

Answer: C.
Line B, to: public function &getX() {

*/
echo '106. In the following code, which line should be changed so it outputs the number 2' . PHP_EOL;

class A3 {
    protected $x = array();
    /* A */
    public function &getX() {
        /* B */
        return $this->x;
        /* C */
    }
}
$a = new A3();
/* D */
array_push($a->getX(), "one");
array_push($a->getX(), "two");
echo count($a->getX());