<?php

$date = new DateTime();
$date = new DateTime('now');

$date = new DateTime('2014-06-18 14:05 EST');
$date = new DateTime('yesterday');
$date = new DateTime('-2 days');
$date = new DateTime('last week');
$date = new DateTime('- 1000 week');
$date = new DateTime('3 weeks ago', new DateTimeZone('Europe/London'));

$ambiguousDate = '10/11/12';
$date = DateTime::createFromFormat('d/m/y', $ambiguousDate);

$date = new DateTime('2014-05-31 1:30pm EST');
$date2 = new DateTime('2014-05-31 8:30pm', new DateTimeZone('Europe/Amsterdam'));


$date->add(new DateInterval('P1Y3M4DT45M'));
$date->sub(new DateInterval('P7DT45M'));

$Liza = new DateTime('1988-10-28');
$Roma = new DateTime('1990-02-10');

var_dump($Liza->diff($Roma));
var_dump($Roma->diff($Liza));