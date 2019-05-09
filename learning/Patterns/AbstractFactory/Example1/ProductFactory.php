<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example1;

class ProductFactory
{
    public function createShippableProduct(float $price, float $shippingCost): ProductInterface
    {
        return new ShippableProduct($price, $shippingCost);
    }

    public function createDigitalProduct(float $price): ProductInterface
    {
        return new DigitalProduct($price);
    }
}
