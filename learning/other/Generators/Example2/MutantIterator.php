<?php

declare(strict_types=1);

namespace learning\other\Generators\Example2;

class MutantIterator
{

    public function __invoke(int $length)
    {
        for ($i = 1; $i <= $length; $i++) {
            yield "Item{$i}" => $i;
            yield $i + 1;
            yield $i + 2;
            yield from [$i / 4, $i * 4];
        }
        return $length + $i;
    }

}