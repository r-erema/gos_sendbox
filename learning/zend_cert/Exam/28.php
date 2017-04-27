<?php
/*
Which line of code can be used to replace the INSERT comment in order to output "hello"?
class C { public $ello = 'ello'; public $c; public $m; function __construct($y) { $this->c = static
function($f) { // INSERT LINE OF CODE HERE }; $this->m = function() { return "h"; }; } } $x
= new C("h"); $f = $x->c; echo $f($x->m);

A.
return $this->m() . "ello";

B.
return $f() . "ello";

C.
return "h". $this->ello;

D.
return $y . "ello";

Answer:

*/

echo '28. Which line of code can be used to replace the INSERT comment in order to output "hello"?
class C { public $ello = \'ello\'; public $c; public $m; function __construct($y) { $this->c = static
function($f) { // INSERT LINE OF CODE HERE }; $this->m = function() { return "h"; }; } } $x
= new C("h"); $f = $x->c; echo $f($x->m);' . PHP_EOL;
echo '// INSERT LINE OF CODE HERE === \'return $f() . "ello";\'' . PHP_EOL;

class C {
    public $ello = 'ello';
    public $c;
    public $m;
    function __construct($y) {
        $this->c = static function($f) {
            return $f() . "ello";
        };
        $this->m = function() {
            return "h";
        };
    }
}
$x = new C("h");
$f = $x->c;
echo $f($x->m);
