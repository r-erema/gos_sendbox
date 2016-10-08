<?php
namespace my\name;

class MyClass {}
function myFunction() {}
const MY_CONST = 1;

var_dump(new MyClass());
var_dump(new \my\name\MyClass());

var_dump(strlen('hi'));

var_dump(namespace\MY_CONST);

var_dump(constant(__NAMESPACE__ . '\MY_CONST'));