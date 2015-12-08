<?php
spl_autoload_register(function ($class) {
	require_once '/home/gutsout/h/gos_sendbox/htdocs/learning/patterns/habr/' . str_replace('\\', '/', $class) . '.php';
});

echo PHP_EOL . "-------------------Registry-------------" . PHP_EOL;
\Registry\Product::set('name', 'First product');
print_r(\Registry\Product::get('name'));

echo PHP_EOL . "-------------------Object Pool-------------" . PHP_EOL;
\ObjectPool\Factory::pushProduct(new \ObjectPool\Product('first'));
\ObjectPool\Factory::pushProduct(new \ObjectPool\Product('second'));
print_r(\ObjectPool\Factory::getProduct('first')->getId() . PHP_EOL);
print_r(\ObjectPool\Factory::getProduct('second')->getId());

echo PHP_EOL . "-------------------Singleton-------------" . PHP_EOL;
$firstProduct = \Singleton\Product::getInstance();
$secondProduct = \Singleton\Product::getInstance();
$firstProduct->name = 'Печыва';
$secondProduct->name = 'Гандон';
print_r($firstProduct->name . PHP_EOL);
print_r($secondProduct->name . PHP_EOL);

echo PHP_EOL . "-------------------Multiton-------------" . PHP_EOL;
\Multiton\FirstProduct::getInstance()->attributes[] = 1;
\Multiton\SecondProduct::getInstance()->attributes[] = 2;

\Multiton\FirstProduct::getInstance()->attributes[] = 3;
\Multiton\SecondProduct::getInstance()->attributes[] = 4;

var_dump(\Multiton\FirstProduct::getInstance()->attributes);
var_dump(\Multiton\SecondProduct::getInstance()->attributes);