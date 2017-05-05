
<?php

/*
How many times will the function counter() be executed in the following code? function
counter($start, &$stop) { if ($stop > $start) { return; } counter($start–, ++$stop); } $start = 5;
$stop = 2; counter($start, $stop);

A.
4

B.
5

C.
6

D.
3

Answer: B.
5

*/
echo '85. How many times will the function counter() be executed in the following code? function
counter($start, &$stop) { if ($stop > $start) { return; } counter($start–, ++$stop); } $start = 5;
$stop = 2; counter($start, $stop);' . PHP_EOL;

function counter($start, &$stop) {
    if ($stop > $start) {
        return;
    }
    counter($start--, ++$stop);
}
$start = 5;
$stop = 2;
@counter($start, $stop);