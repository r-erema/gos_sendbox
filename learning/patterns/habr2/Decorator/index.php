<?php
require_once 'ICoffee.php';
require_once 'SimpleCoffee.php';
require_once 'MilkCoffee.php';
require_once 'WhipCoffee.php';
require_once 'VanillaCoffee.php';

$someCoffee = new SimpleCoffee();
echo $someCoffee->getCost() . PHP_EOL;
echo $someCoffee->getDescription() . PHP_EOL;
echo PHP_EOL;

$someCoffee = new MilkCoffee($someCoffee);
echo $someCoffee->getCost() . PHP_EOL;
echo $someCoffee->getDescription() . PHP_EOL;
echo PHP_EOL;

$someCoffee = new WhipCoffee($someCoffee);
echo $someCoffee->getCost() . PHP_EOL;
echo $someCoffee->getDescription() . PHP_EOL;
echo PHP_EOL;

$someCoffee = new VanillaCoffee($someCoffee);
echo $someCoffee->getCost() . PHP_EOL;
echo $someCoffee->getDescription() . PHP_EOL;
echo PHP_EOL;