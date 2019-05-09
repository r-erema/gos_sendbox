<?php

declare(strict_types=1);

namespace learning\Patterns\Prototype\Example1;

class FooBookPrototype extends BookPrototype
{
    public const CATEGORY = 'Foo';

    protected $category = self::CATEGORY;

    public function __clone()
    {
    }
}
