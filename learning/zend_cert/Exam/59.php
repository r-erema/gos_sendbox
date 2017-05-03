
<?php

/*
Given a DateTime object that is set to the first second of the year 2014, which of the
following samples will correctly return a date in the format ‘2014-01-01 00:00:01’?

A.
$datetime->format(‘%Y-%m-%d %h:%i:%s’, array(‘year’, ‘month’, ‘day’, ‘hour’, ‘minute’,
‘second’))

B.
$datetime->format(‘Y-m-d H:i:s’)

C.
$datetime->format(‘%Y-%m-%d %h:%i:%s’)

D.
$date = date(‘Y-m-d H:i:s’, $datetime);

Answer: B.
$datetime->format(‘Y-m-d H:i:s’)
*/
echo '59. Given a DateTime object that is set to the first second of the year 2014, which of the following samples will correctly return a date in the format ‘2014-01-01 00:00:01’?' . PHP_EOL;
echo '$datetime->format(‘Y-m-d H:i:s’)' . PHP_EOL;
