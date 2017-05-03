
<?php

/*
Given the following DateTime object, which sample will NOT alter the date to the value
‘2014-02-15’? $date = new DateTime(‘2014-03-15’);

A.
$date->sub(new DateInterval(‘P1M’));

B.
$date->setDate(2014, 2, 15);

C.
$date->modify(‘-1 month’);

D.
$date->diff(new DateInterval(‘-P1M’));

Answer: D.
$date->diff(new DateInterval(‘-P1M’));
*/
echo '61. Given the following DateTime object, which sample will NOT alter the date to the value
‘2014-02-15’? $date = new DateTime(‘2014-03-15’);' . PHP_EOL;
echo '$date->diff(new DateInterval(‘-P1M’));' . PHP_EOL;
