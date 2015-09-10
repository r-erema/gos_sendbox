<?php
/*    $x = range(1, 100000);
    $t = microtime(true);
    $x2 = array_map(function($v) {
        return $v + 1;
    }, $x);
var_dump($x);*/

$arr = [
    'a' => -1,
    'b' => 20,
    'c' => 0
];

$x = array_filter($arr, function ($v) {
    return $v > 0;
});


