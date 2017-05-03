
<?php

/*
Given the following DateTime objects, what can you use to compare the two dates and
indicate that $date2 is the later of the two dates? $date1 = new DateTime('2014-02-03');
$date2 = new DateTime('2014-03-02');

A.
$date2 > $date1

B.
$date2 < $date1

C.
$date1->diff($date2) < 0

D.
$date1->diff($date2) > 0

Answer: A.
$date2 > $date1
*/
echo '60. Given the following DateTime objects, what can you use to compare the two dates and
indicate that $date2 is the later of the two dates? $date1 = new DateTime(\'2014-02-03\');
$date2 = new DateTime(\'2014-03-02\');' . PHP_EOL;
echo '$date2 > $date1' . PHP_EOL;
