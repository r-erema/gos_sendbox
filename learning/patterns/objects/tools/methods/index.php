<?php
class Cg {
    public function cc(){}
}
$c = new Cg;

var_dump(is_callable(array('Cg','cc')));