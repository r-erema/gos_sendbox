<?php

declare(strict_types=1);

namespace learning\Patterns\Specification\Example1;

interface SpecificationInterface
{
    public function isSatisfiedBy(Item $item): bool;
}
