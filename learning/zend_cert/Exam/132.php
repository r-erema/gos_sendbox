
<?php

/*
What is the result of the following code? define('PI', 3.14); class T { const PI = PI; } class
Math { const PI = T::PI; } echo Math::PI;

A.
PI

B.
T::PI

C.
Parse error

D.
3.14

Answer: D.
3.14

*/
echo '132. What is the result of the following code? define(\'PI\', 3.14); class T { const PI = PI; } class
Math { const PI = T::PI; } echo Math::PI;' . PHP_EOL;

define('PI', 3.14);
class T132 {
    const PI = PI;
}
class Math132 { const PI = T132::PI; }
echo Math132::PI;