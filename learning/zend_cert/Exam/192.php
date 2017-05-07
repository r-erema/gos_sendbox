
<?php

/*
What will be the output of the following code? $a = array(0, 1, 2 => array(3, 4)); $a[3] =
array(4, 5); echo count($a, 1);

A.
4

B.
5

C.
8

D.
None of the above

Answer: A.
4

*/
echo '192. What will be the output of the following code? $a = array(0, 1, 2 => array(3, 4)); $a[3] =
array(4, 5); echo count($a, 1);' . PHP_EOL;

$a = array(0, 1, 2 => array(3, 4));
$a[3] = array(4, 5);
echo count($a, 1);