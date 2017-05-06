
<?php

/*
Given the following code, how can we use both traits A and B in the same class? (select all
that apply) trait A { public function hello() { return "hello"; } public function world() { return
"world"; } } trait B { public function hello() { return "Hello"; } public function person($name) {
return ":$name"; } }

A.
Rename the A::hello() method to a different name using A::hello as helloA;

B.
Use B::hello() instead of A 's version using B::hello insteadof A

C.
Use B::hello() instead of A 's version using use B::hello

D.
Rename the A::hello() method to a different name using A::hello renameto helloA;

E.
None of the above (both can be used directly)

Answer: A.
int(3)

*/
echo '106. Given the following code, how can we use both traits A and B in the same class? (select all
that apply) trait A { public function hello() { return "hello"; } public function world() { return
"world"; } } trait B { public function hello() { return "Hello"; } public function person($name) {
return ":$name"; } }' . PHP_EOL;

trait tA3 {
    public function hello() {
        return "hello";
    }
    public function world() {
        return "world";
    }
}
trait tB3 {
    public function hello() {
        return "Hello";
    }
    public function person($name) {
        return ":$name";
    }
}

class A_3 {
    use tA3, tB3 {
        tA3::hello insteadof tB3;
        tB3::hello as tB3hello;
    }
}

$a3 = new A_3;
echo $a3->hello();
echo $a3->tB3hello();