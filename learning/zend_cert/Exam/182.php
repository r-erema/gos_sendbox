
<?php

/*
What is the output of the following code? for ($i = 0; $i < 1.02; $i += 0.17) { $a[$i] = $i; }
echo count($a);

A.
7

B.
0

C.
1

D.
2

E.
6

Answer: C.
1

*/
echo '182. What is the output of the following code? for ($i = 0; $i < 1.02; $i += 0.17) { $a[$i] = $i; }
echo count($a);' . PHP_EOL;
for ($i = 0; $i < 102; $i += 17) {
    $a182[$i] = $i;
}
echo count($a182);