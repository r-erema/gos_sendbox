<?php

declare(strict_types=1);

namespace learning\Patterns\Flyweight\Example1;

interface FlyweightInterface
{
    public function render(string $extrinsicState): string;
}