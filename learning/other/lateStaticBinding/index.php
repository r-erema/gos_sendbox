<?php
function __autoload($className) {
	include $className.'.class.php';
}

$beerDrink = new Beer();
$aleDrink = new Ale();

echo 'Beer is: ' . $beerDrink->getName() . "<br>";
echo 'Beer is: ' . $aleDrink->getName() . "<br>";

echo 'Beer is: ' . $beerDrink->getStaticName() . "<br>";
echo 'Beer is: ' . $aleDrink->getStaticName() . "<br>";