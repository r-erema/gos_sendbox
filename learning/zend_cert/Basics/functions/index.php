<?php

$g = 3;

function &func() {
    global $g;
    return $g;
}

$d = func();
var_dump($d);


$g = 123;
var_dump($d);

$d = 2;
var_dump(func());