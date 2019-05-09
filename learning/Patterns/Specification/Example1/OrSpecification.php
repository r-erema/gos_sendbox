<?php

declare(strict_types=1);

namespace learning\Patterns\Specification\Example1;

class OrSpecification implements SpecificationInterface
{
    private $specifications;

    public function __construct(SpecificationInterface ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(Item $item): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($item)) {
                return true;
            }
        }
        return false;
    }
}
