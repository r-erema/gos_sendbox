
<?php
/*
What is the output of the following code? class Test { public function __call($name, $args) {
call_user_func_array(array('static', "test$name"), $args); } public function testS($l) { echo
"$l,"; } } class Test2 extends Test { public function testS($l) { echo "$l,$l,"; } } $test = new
Test2(); $test->S('A');

A.
A,

B.


C.
A,A,A,

D.
PHP Warning: call_user_func_array() expects parameter 1 to be a valid callback

Answer: B
A,A

*/

echo '37. What is the output of the following code? class Test { public function __call($name, $args) {
call_user_func_array(array(\'static\', "test$name"), $args); } public function testS($l) { echo
"$l,"; } } class Test2 extends Test { public function testS($l) { echo "$l,$l,"; } } $test = new
Test2(); $test->S(\'A\');' . PHP_EOL;


class Test
{
    public function __call($name, $args)
    {
        call_user_func_array(array(
            'static',
            "test$name"
        ), $args);
    }
    public function testS($l)
    {
        echo "$l,";
    }
}

class Test2 extends Test
{
    public function testS($l)
    {
        echo "$l,$l,";
    }
}
$test = new Test2();
$test->S('A');