<?php

function __autoload($class) {
	require_once $class.'.php';
}

$p = new Person();
$p->name = 'Vasya';
echo $p->name;

function h($r) {
	return new $r;
}

h('Person');