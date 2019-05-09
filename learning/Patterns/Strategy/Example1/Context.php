<?php

declare(strict_types=1);

namespace learning\Patterns\Strategy\Example1;

class Context
{
    private $comparator;

    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    public function executeStrategy(array $elements): array
    {
        uasort($elements, [$this->comparator, 'compare']);
        return $elements;
    }
}
