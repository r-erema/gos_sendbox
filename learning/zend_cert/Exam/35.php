
<?php
/*
What is the output of the following code? class Base { protected static function whoami() {
echo "Base "; } public static function whoareyou() { static::whoami(); } } class A extends
Base { public static function test() { Base::whoareyou(); self::whoareyou();
parent::whoareyou();

A.
:test();

B.
Base B A A B

C.
Base B B A B

D.
:whoareyou(); static::whoareyou(); } public static function whoami() { echo "A "; } } class B 
extends A { public static function whoami() { echo "B "; } }

E.
Base A Base A B

F.
B B B B B

Answer: B, E
spl_object_hash, SplObjectStorage

*/

echo '35. What is the output of the following code? class Base { protected static function whoami() {
echo "Base "; } public static function whoareyou() { static::whoami(); } } class A extends
Base { public static function test() { Base::whoareyou(); self::whoareyou();
parent::whoareyou();' . PHP_EOL;

class Base_
{
    protected static function whoami()
    {
        echo "Base "; }

    public static function whoareyou()
    {
        static::whoami();
    }
}
class A extends Base_ {
    public static function test()
    {
        Base_::whoareyou();
        self::whoareyou();
        parent::whoareyou();
        A::whoareyou();
        static::whoareyou();
    }
    public static function whoami() {
        echo "A ";
    }
}

class B extends A {
    public static function whoami() {
        echo "B ";
    }
}
B::test();


