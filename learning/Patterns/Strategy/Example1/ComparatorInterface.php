<?php

declare(strict_types=1);

namespace learning\Patterns\Strategy\Example1;

interface ComparatorInterface
{
    public function compare(array $a, array $b): int;
}
