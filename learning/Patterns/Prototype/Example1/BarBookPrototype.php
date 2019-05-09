<?php

declare(strict_types=1);

namespace learning\Patterns\Prototype\Example1;

class BarBookPrototype extends BookPrototype
{
    public const CATEGORY = 'Bar';

    protected $category = self::CATEGORY;

    public function __clone()
    {
    }
}
