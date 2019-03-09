<?php

declare(strict_types=1);

namespace learning\Patterns\Specification\Example1;

class PriceSpecification implements SpecificationInterface
{

    private $maxPrice, $minPrice;

    public function __construct(float $minPrice, float $maxPrice)
    {
        $this->maxPrice = $maxPrice;
        $this->minPrice = $minPrice;
    }

    public function isSatisfiedBy(Item $item): bool
    {
        if ($this->maxPrice !== null && $item->getPrice() > $this->maxPrice) {
            return false;
        }

        if ($this->minPrice !== null && $item->getPrice() < $this->minPrice) {
            return false;
        }
        return true;
    }

}