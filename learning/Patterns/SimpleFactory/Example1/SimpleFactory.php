<?php

declare(strict_types=1);

namespace learning\Patterns\SimpleFactory\Example1;

class SimpleFactory
{
    public function createBicycle(): Bicycle
    {
        return new Bicycle();
    }
}