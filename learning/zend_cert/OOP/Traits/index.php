<?php

trait one {
    public function foo() {
        echo __METHOD__;
    }
}
trait two {
    public function foo() {
        echo __METHOD__;
    }
}

class MyClass {
    use one, two {
        two::foo insteadof one;
        two::foo as c;
    }
}

(new MyClass())->c();
(new MyClass())->foo();