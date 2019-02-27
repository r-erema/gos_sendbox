<?php

namespace learning\Patterns\AbstractFactory\Example1\Tests;

use learning\Patterns\AbstractFactory\Example1\DigitalProduct;
use learning\Patterns\AbstractFactory\Example1\ProductFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{

	public function testCanCreateDigitalProduct(): void
	{
		$factory = new ProductFactory();
		$product = $factory->createDigitalProduct(150.7);
		$this->assertInstanceOf(DigitalProduct::class, $product);
	}
}