
<?php

/*
What is the output of the following code? function ratio ($x1 = 10, $x2) { if (isset ($x2)) {
return $x2 / $x1; } } echo ratio (0);

A.
An integer overflow error

B.
A warning, because $x1 is not set

C.
A warning, because $x2 is not set

D.
A floating-point overflow error

E.
Nothing

F.
0

Answer: C.
A warning, because $x2 is not set

*/
echo '90. What is the output of the following code? function ratio ($x1 = 10, $x2) { if (isset ($x2)) {
return $x2 / $x1; } } echo ratio (0);' . PHP_EOL;

function ratio ($x1 = 10, $x2) {
    if (isset ($x2)) {
        return $x2 / $x1;
    }
}

//echo ratio (0);