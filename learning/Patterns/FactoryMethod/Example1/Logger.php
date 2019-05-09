<?php

declare(strict_types=1);

namespace learning\Patterns\FactoryMethod\Example1;

interface Logger
{
    public function log(string $message): void;
}
