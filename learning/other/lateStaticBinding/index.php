<?php

function __autoload($className) {
	include $className.'.php';
}

$beer = new Beer();
$ale = new Ale();

echo $beer->getName();
echo $ale->getName();
echo '<hr />';

echo $beer::NAME;
echo $ale::NAME;
echo '<hr />';

echo Beer::NAME;
echo Ale::NAME;
echo '<hr />';

echo $beer->getColor();
echo $ale->getColor();
echo '<hr />';
echo '<hr />';
echo '<hr />';

$a = new A();
$b = new B();

B::test();
echo '<hr />';

//echo B::getName();
//echo B::getStaticName();

echo '<hr />';
echo '<hr />';
echo '<hr />';

$o = new testChild();
$o->test();

echo '<hr />';
echo '<hr />';
echo '<hr />';

C::test();

