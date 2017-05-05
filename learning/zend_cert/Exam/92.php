
<?php

/*
What is the output of the following code? function increment (&$val) { return $val + 1; } $a =
1; echo increment ($a); echo increment ($a);

A.
22

Answer: A.
22

*/
echo '92. What is the output of the following code? function increment (&$val) { return $val + 1; } $a =
1; echo increment ($a); echo increment ($a);' . PHP_EOL;
function increment4 (&$val) {
    return $val + 1;
} $a = 1;
echo increment4 ($a);
echo increment4 ($a);