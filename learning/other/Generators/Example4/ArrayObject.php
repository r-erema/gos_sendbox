<?php

declare(strict_types=1);

namespace learning\other\Generators\Example4;

use Iterator;
use IteratorAggregate;

class ArrayObject implements IteratorAggregate
{

    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function getIterator(): Iterator
    {
        foreach ($this->data as $key => $value) {
            yield $key => $value;
        }
    }

}
