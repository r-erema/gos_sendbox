
<?php

/*
Which of the following expressions will evaluate to a random value from an array below?
$array = array("Sue","Mary","John","Anna");

A.
array_rand($array);

B.
array_rand($array, 1);

C.
shuffle($array);

D.
$array[array_rand($array)];

E.
array_values($array, ARRAY_RANDOM);

Answer: D.
$array[array_rand($array)];

*/
echo '189. Which of the following expressions will evaluate to a random value from an array below?
$array = array("Sue","Mary","John","Anna");' . PHP_EOL;
echo '$array[array_rand($array)];' . PHP_EOL;