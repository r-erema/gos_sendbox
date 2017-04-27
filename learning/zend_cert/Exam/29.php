<?php
/*
What is the output of the following code? function z($x) { return function ($y) use ($x) { return str_repeat($y, $x); }; } $a = z(2); $b = z(3); echo $a(3) . $b(2);

A.
22333

B.
33222

C.
33322

D.
222333

Answer: B
33222

*/

echo '29. What is the output of the following code? function z($x) { return function ($y) use ($x) { return str_repeat($y, $x); }; }' . PHP_EOL;
function z($x) {
    return function ($y) use ($x) {
        return str_repeat($y, $x);
    };
}
$a = z(2);
$b = z(3);
echo $a(3) . $b(2);

