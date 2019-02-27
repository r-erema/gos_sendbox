<?php

namespace learning\Patterns\AbstractFactory\Example1\Tests;

use learning\Patterns\AbstractFactory\Example1\DigitalProduct,
    learning\Patterns\AbstractFactory\Example1\ProductFactory,
    learning\Patterns\AbstractFactory\Example1\ShippableProduct,
    PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{

    public function testCanCreateDigitalProduct(): void
    {
        $factory = new ProductFactory();
        $product = $factory->createDigitalProduct(150.7);
        $this->assertInstanceOf(DigitalProduct::class, $product);
    }

    public function testCanCreateShippableProduct(): void
    {
        $factory = new ProductFactory();
        $product = $factory->createShippableProduct(14.3, 7);
        $this->assertInstanceOf(ShippableProduct::class, $product);
    }

    public function testCanCalculatePriceForDigitalProduct(): void
    {
        $factory = new ProductFactory();
        $product = $factory->createDigitalProduct(150.7);
        $this->assertEquals(150.7, $product->calculatePrice());
    }

    public function testCanCalculatePriceForShippableProduct(): void
    {
        $factory = new ProductFactory();
        $product = $factory->createShippableProduct(150, 14);

        $this->assertEquals(164, $product->calculatePrice());
    }

}