
<?php

/*
What will be the output value of the following code? $array = array(1,2,3); while (list(,$v) =
each($array)); var_dump(current($array));

A.
bool(false)

B.
int(3)

C.
int(1)

D.
NULL

E.
Array

Answer: A.
bool(false)

*/
echo '191. What will be the output value of the following code? $array = array(1,2,3); while (list(,$v) =
each($array)); var_dump(current($array));' . PHP_EOL;
$array = array(1,2,3);
while (list(,$v) = each($array));
var_dump(current($array));