
<?php

/*
What is the output of the following code? function append($str) { $str = $str.'append'; }
function prepend(&$str) { $str = 'prepend'.$str; } $string = 'zce'; append(prepend($string));
echo $string;

A.
zceappend

B.
prependzceappend

C.
prependzce

D.
zce

Answer: C.
prependzce

*/
echo '81. What is the output of the following code? function append($str) { $str = $str.\'append\'; }
function prepend(&$str) { $str = \'prepend\'.$str; } $string = \'zce\'; append(prepend($string));
echo $string;' . PHP_EOL;

function append($str) {
    $str = $str.'append';
}

function prepend(&$str) {
    $str = 'prepend'.$str;
}
$string = 'zce';
append(prepend($string));
echo $string;
