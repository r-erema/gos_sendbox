
<?php

/*
Which string will be returned by the following function call? $test = '/etc/conf.d/wireless';
substr($test, strrpos($test, '/')); // note that strrpos() is being called, and not strpos()

A.
""

B.
"/wireless"


C.
"wireless"

D.
"/conf.d/wireless"

E.
"/etc"

Answer: B.
"/wireless"

*/
echo '212. Which string will be returned by the following function call? $test = \'/etc/conf.d/wireless\';
substr($test, strrpos($test, \'/\')); // note that strrpos() is being called, and not strpos()' . PHP_EOL;
$test = '/etc/conf.d/wireless';
$strrpos = strrpos($test, '/');
$substr = substr($test, $strrpos); // note that strrpos() is being called, and not strpos()
echo $substr;