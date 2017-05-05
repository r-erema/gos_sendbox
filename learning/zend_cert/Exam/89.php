
<?php

/*
What is the output of the following code? function fibonacci (&$x1 = 0, &$x2 = 1) { $result =
$x1 + $x2; $x1 = $x2; $x2 = $result; return $result; } for ($i = 0; $i < 10; $i++) { echo
fibonacci() . ','; }

A.
1,1,2,3,5,8,13,21,34,55,

B.
Nothing

C.
1,1,1,1,1,1,1,1,1,1,

D.
An error

Answer: C.
1,1,1,1,1,1,1,1,1,1,


*/
echo '89. What is the output of the following code? function fibonacci (&$x1 = 0, &$x2 = 1) { $result =
$x1 + $x2; $x1 = $x2; $x2 = $result; return $result; } for ($i = 0; $i < 10; $i++) { echo
fibonacci() . ','; }' . PHP_EOL;

function fibonacci (&$x1 = 0, &$x2 = 1) {
    $result = $x1 + $x2;
    $x1 = $x2;
    $x2 = $result;
    return $result;
}
for ($i = 0; $i < 10; $i++){
    echo fibonacci() . ',';
}