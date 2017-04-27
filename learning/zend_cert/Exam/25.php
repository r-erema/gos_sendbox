<?php
/*
What would be the output of the following code? namespace MyFramework\DB; class MyClass { static function myName() { return __METHOD__; } } print MyClass::myName();

A.
MyFramework\DB\myName

B.
MyFramework\DB\MyClass\myName

C.
MyFramework\DB\MyClass::myName

D.
MyClass::myName
MyFramework\DB\MyClass::myName

Answer: С
MyFramework\DB\MyClass::myName

*/

namespace MyFramework\DB;
echo '25. What would be the output of the following code? namespace MyFramework\DB; class MyClass { static function myName() { return __METHOD__; } } print MyClass::myName();' . PHP_EOL;
class MyClass {
    static function myName() {
        return __METHOD__;
    }
}
print MyClass::myName();
