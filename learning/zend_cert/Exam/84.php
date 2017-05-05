
<?php

/*
What is the output of the following code? function increment ($val) { $_GET['m'] = (int)
$_GET['m'] + 1; } $_GET['m'] = 1; echo $_GET['m'];

A.
1

Answer: C.
Use the headers_sent() function

*/
echo '84. What is the output of the following code? function increment ($val) { $_GET[\'m\'] = (int) $_GET[\'m\'] + 1; } $_GET[\'m\'] = 1; echo $_GET[\'m\'];' . PHP_EOL;

function increment3 ($val) {
    $_GET['m'] = (int) $_GET['m'] + 1;
}
$_GET['m'] = 1;
echo $_GET['m'];
