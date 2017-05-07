
<?php

/*
After performing the following operations: $a = array('a', 'b', 'c'); $a =
array_keys(array_flip($a)); What will be the value of $a?

A.
None of the above

B.
array('a', 'b', 'c')

C.
array('c', 'b', 'a')

D.
array(2, 1, 0)

Answer: B.
array('a', 'b', 'c')

*/
echo '183. After performing the following operations: $a = array(\'a\', \'b\', \'c\'); $a =
array_keys(array_flip($a)); What will be the value of $a?' . PHP_EOL;

$a = array('a', 'b', 'c'); $a = array_keys(array_flip($a));