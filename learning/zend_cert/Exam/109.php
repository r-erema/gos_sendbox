
<?php

/*
What will be the result of the following operation? $a = array_merge([1,2,3] + [4=>1,5,6]);
echo $a[2];

A.
3

B.
Parse error

C.
4

D.
false

E.
2

Answer: A.
3

*/
echo '109. What will be the result of the following operation? $a = array_merge([1,2,3] + [4=>1,5,6]);
echo $a[2];' . PHP_EOL;

$f = [1,2,3] + [4=>1,5,6];
$a = array_merge([1,2,3] + [4=>1,5,6]);
echo $a[2];