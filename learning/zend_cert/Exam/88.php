
<?php

/*
What is the output of the following code? class a { public $val; } function renderVal (a $a) { if
($a) { echo $a->val; } } renderVal (null);

A.
A syntax error in the function declaration line

B.
An error, because null is not an instance of 'a'

C.
Nothing, because a null value is being passed to renderVal()

D.
NULL

Answer: B.
An error, because null is not an instance of 'a'


*/
echo '88. What is the output of the following code? class a { public $val; } function renderVal (a $a) { if
($a) { echo $a->val; } } renderVal (null);' . PHP_EOL;

class a2 {
    public $val;
}
function renderVal (a2 $a) {
    if ($a) {
        echo $a->val;
    }
}
//renderVal (null);