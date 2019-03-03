<?php

declare(strict_types=1);

namespace learning\Patterns\Builder\Example1;

abstract class Vehicle
{

    private $data;

    public function setPart(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

}