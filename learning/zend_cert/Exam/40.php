
<?php
/*
Consider the following code. What change must be made to the class for the code to work
as written? class Magic { protected $v = array("a" => 1, "b" => 2, "c" => 3); public function
__get($v) { return $this->v[$v]; } } $m = new Magic(); $m->d[] = 4; echo $m->d[0];

A.
Nothing, this code works just fine.

B.
Add __set method doing $this->v[$var] = $val

C.
Rewrite __get as: public function __get(&$v)

D.
Rewrite __get as: public function &__get($v)

E.
Make __get method static

Answer: D
Rewrite __get as: public function &__get($v)

*/

echo '40. Consider the following code. What change must be made to the class for the code to work
as written? class Magic { protected $v = array("a" => 1, "b" => 2, "c" => 3); public function
__get($v) { return $this->v[$v]; } } $m = new Magic(); $m->d[] = 4; echo $m->d[0];' . PHP_EOL;

class Magic {
    protected $v = array("a" => 1, "b" => 2, "c" => 3);

    public function &__get($v) {
        return $this->v[$v];
    }
}
$m = new Magic();
$m->d[] = 4;
echo $m->d[0];