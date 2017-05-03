<?php

/*class A {
    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
    public static function test() {
        //self::who();
        static::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
}

B::test();*/

/*class A {
    public function foo() {
        echo __CLASS__ . PHP_EOL;
    }
    public function test() {
        $this->foo();
        static::foo();
    }
}

class B extends A {}

class C extends A {
    public function foo() {
        echo __CLASS__ . PHP_EOL;
    }
}

$b = new B();
$b->test();

$c = new C();
$c->test();*/

/*class A {
    public static function foo() {
        static::who();
    }

    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
}

class B extends A {
    public static function test() {
        A::foo();
        parent::foo();
        self::foo();
    }

    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
}

class C extends B {
    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
}

C::test();*/

/*class Beer {
    const NAME = 'Beer!';

    public function getName() {
        return static::class;
    }
}
class Ale extends Beer {}

echo (new Beer())->getName() . PHP_EOL;
echo (new Ale())->getName() . PHP_EOL;*/