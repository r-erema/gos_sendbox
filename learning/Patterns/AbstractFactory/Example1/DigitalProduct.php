<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example1;

class DigitalProduct implements ProductInterface
{
    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function calculatePrice(): float
    {
        return $this->price;
    }
}
