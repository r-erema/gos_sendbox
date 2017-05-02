<?php
/*
What is the output of the following code? echo "1" + 2 * "0x02";

A.
1

B.
3

C.
5

D.
20

E.
7

Answer PHP 5.5: C
5

Answer PHP 7: A
1 (with notice)

*/

echo '9. What is the output of the following code? echo "1" + 2 * "0x02"; :' . PHP_EOL;
echo @("1" + 2 * "0x02");