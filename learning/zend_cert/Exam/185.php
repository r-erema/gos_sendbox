
<?php

/*
Which is the most efficient way to determine if a key is present in an array, assuming the
array has no NULL values?

A.
in_array(‘key’, array_keys($a))

B.
isset($a[‘key’])

C.
array_key_exists(‘key’, $a)

D.
None of the above


Answer: B.
isset($a[‘key’])

*/
echo '185. Which is the most efficient way to determine if a key is present in an array, assuming the array has no NULL values?' . PHP_EOL;
echo 'isset($a[‘key’])' . PHP_EOL;