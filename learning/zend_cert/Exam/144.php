
<?php

/*
In the following code, which classes can be instantiated? abstract class Graphics { abstract
function draw($im, $col); } abstract class Point1 extends Graphics { public $x, $y; function
__construct($x, $y) { $this->x = $x; $this->y = $y; } function draw($im, $col) {
ImageSetPixel($im, $this->x, $this->y, $col); } } class Point2 extends Point1 { } abstract
class Point3 extends Point2 { }

A.
Point3

B.
Point2

C.
Point1

D.
Graphics

E.
None, the code is invalid

Answer: B.
Point2

*/
echo '144. In the following code, which classes can be instantiated? abstract class Graphics { abstract
function draw($im, $col); } abstract class Point1 extends Graphics { public $x, $y; function
__construct($x, $y) { $this->x = $x; $this->y = $y; } function draw($im, $col) {
ImageSetPixel($im, $this->x, $this->y, $col); } } class Point2 extends Point1 { } abstract
class Point3 extends Point2 { }' . PHP_EOL;
abstract class Graphics {
    abstract function draw($im, $col);
}
abstract class Point1 extends Graphics {
    public $x, $y;
    function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    function draw($im, $col) {
        ImageSetPixel($im, $this->x, $this->y, $col); }
}
class Point2 extends Point1 { }
abstract class Point3 extends Point2 { }

echo 'Point2' . PHP_EOL;
