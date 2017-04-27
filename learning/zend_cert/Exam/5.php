<?php
/*
What is the output of the following code? $a = 'a'; $b = 'b'; echo isset($c) ? $a.$b.$c : ($c = 'c').'d';

A.
abc

B.
cd

C.
0d

Answer: B
cd

*/

echo '5. What is the output of the following code? $a = \'a\'; $b = \'b\'; echo isset($c) ? $a.$b.$c : ($c = \'c\').\'d\'; :' . PHP_EOL;

$a = 'a';
$b = 'b';
echo isset($c) ? $a.$b.$c : ($c = 'c').'d';