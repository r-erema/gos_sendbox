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


echo PHP_EOL . "-------------------Multiton Registry Factory-------------" . PHP_EOL;
\Multiton\FirstFactory::getInstance('FirstProduct')->attributes[] = 1;
\Multiton\FirstFactory::getInstance('SecondProduct')->attributes[] = 2;
\Multiton\SecondFactory::getInstance('FirstProduct')->attributes[] = 3;
\Multiton\SecondFactory::getInstance('SecondProduct')->attributes[] = 4;
\Multiton\FirstFactory::getInstance('FirstProduct')->attributes[] = 5;
\Multiton\FirstFactory::getInstance('SecondProduct')->attributes[] = 6;
\Multiton\SecondFactory::getInstance('FirstProduct')->attributes[] = 7;
\Multiton\SecondFactory::getInstance('SecondProduct')->attributes[] = 8;
print_r(\Multiton\FirstFactory::getInstance('FirstProduct')->attributes);
print_r(\Multiton\FirstFactory::getInstance('SecondProduct')->attributes);
print_r(\Multiton\SecondFactory::getInstance('FirstProduct')->attributes);
print_r(\Multiton\SecondFactory::getInstance('SecondProduct')->attributes);

echo PHP_EOL . "-------------------Factory-------------" . PHP_EOL;
$firstFactory = new \Factory\FirstFactory();
$firstProduct = $firstFactory->getProduct();
$secondFactory = new \Factory\SecondFactory();
$secondProduct = $secondFactory->getProduct();
print_r($firstProduct->getName() . PHP_EOL);
print_r($secondProduct->getName() . PHP_EOL);

echo PHP_EOL . "-------------------Abstract factory-------------" . PHP_EOL;
$firstProduct = \AbstractFactory\AbstractFactory::getFactory()->getProduct();
\AbstractFactory\Config::$factory = 2;
$secondProduct = AbstractFactory\AbstractFactory::getFactory()->getProduct();
print_r($firstProduct->getName() . PHP_EOL);
print_r($secondProduct->getName() . PHP_EOL);

echo PHP_EOL . "-------------------Lazy initialization-------------" . PHP_EOL;
$factory = new \LazyInitialization\Factory();
print_r($factory->getFirstProduct()->getName() . PHP_EOL);
print_r($factory->getSecondProduct()->getName() . PHP_EOL);
print_r($factory->getFirstProduct()->getName() . PHP_EOL);