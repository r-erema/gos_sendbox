<?php
/*
What is the output of the following code? $a = 3; switch ($a) { case 1: echo ‘one’; break;
case 2: echo ‘two’; break; default: echo ‘four’; break; case 3: echo ‘three’; break; }

A.
three

B.
four

C.
two

D.
one

Answer: A
three
*/
echo '2. What is the output of the following code? $a = 3; switch ($a) { case 1: echo ‘one’; break;
case 2: echo ‘two’; break; default: echo ‘four’; break; case 3: echo ‘three’; break; } :' . PHP_EOL;
$a = 3;
switch ($a) {
    case 1: echo 'one'; break;
    case 2: echo 'two'; break;
    default: echo 'four'; break;
    case 3: echo 'three'; break;
}