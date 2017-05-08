
<?php

/*
How many elements does the $matches array contain after the following function call is
performed? preg_match('/^(\d{1,2}([a-z]+))(?:\s*)\S+ (?=201[0-9])/', '21st March 2014′,
$matches);

A.
1

B.
2

C.
3

D.
4

Answer: B.
2

*/
echo '204. How many elements does the $matches array contain after the following function call is
performed? preg_match(\'/^(\d{1,2}([a-z]+))(?:\s*)\S+ (?=201[0-9])/\', \'21st March 2014′,
$matches);' . PHP_EOL;
preg_match('/^(\d{1,2}([a-z]+))(?:\s*)\S+ (?=201[0-9])/', '21st March 2014', $matches);