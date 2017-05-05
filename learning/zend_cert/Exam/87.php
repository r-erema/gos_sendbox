
<?php

/*
What will the $array array contain at the end of this script? function modifyArray (&$array) {
foreach ($array as &$value) { $value = $value + 1; } $value = $value + 2; } $array = array (1,
2, 3); modifyArray($array);

A.
2, 3, 4

B.
2, 3, 6

C.
4, 5, 6

D.
1, 2, 3

Answer: B.
2, 3, 6


*/
echo '87. What will the $array array contain at the end of this script? function modifyArray (&$array) {
foreach ($array as &$value) { $value = $value + 1; } $value = $value + 2; } $array = array (1,
2, 3); modifyArray($array);' . PHP_EOL;

function modifyArray (&$array) {
    foreach ($array as &$value) {
        $value = $value + 1;
    }
    $value = $value + 2;
}
$array = array (1, 2, 3);
modifyArray($array);
print_r($array);