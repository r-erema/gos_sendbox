
<?php

/*
Given the following code, what will the output be: trait MyTrait { private $abc = 1; public
function increment() { $this->abc++; } public function getValue() { return $this->abc; } } class
MyClass { use MyTrait; public function incrementBy2() { $this->increment(); $this->abc++; }
} $c = new MyClass; $c->incrementBy2(); var_dump($c->getValue());

A.
int(3)

B.
NULL

C.
Notice: Undefined property MyClass::$abc

D.
Fatal error: Access to private variable MyTrait::$abc from context MyClass

E.
int(2)

Answer: A.
int(3)

*/
echo '105. Given the following code, what will the output be: trait MyTrait { private $abc = 1; public
function increment() { $this->abc++; } public function getValue() { return $this->abc; } } class
MyClass { use MyTrait; public function incrementBy2() { $this->increment(); $this->abc++; }
} $c = new MyClass; $c->incrementBy2(); var_dump($c->getValue());' . PHP_EOL;

trait MyTrait {
    private $abc = 1;
    public function increment() {
        $this->abc++;
    }
    public function getValue() {
        return $this->abc;
    }
}
class MyClass {
    use MyTrait;
    public function incrementBy2() {
        $this->increment();
        $this->abc++;
    }
}
$c = new MyClass;
$c->incrementBy2();
var_dump($c->getValue());