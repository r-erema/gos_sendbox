<?php

declare(strict_types=1);

namespace learning\other\Generators\Example2;

class MutantRefIterator
{
    public function &__invoke(int $length)
    {
        for ($i = 1; $i <= $length; $i++) {
            yield "Item{$i}" => $i;
        }
    }
}
