<?php

declare(strict_types=1);

namespace learning\other\Generators\Example2\Tests;

use learning\other\Generators\Example2\MutantIterator;
use learning\other\Generators\Example2\MutantRefIterator;
use PHPUnit\Framework\TestCase;

class IterTest extends TestCase
{

    public function testIter(): void
    {
        $iter = (new MutantIterator())(12);
        $sum = 0;
        foreach ($iter as $key => $value) {
            $sum += $value;
        }
        self::assertEquals(601.5, $sum);
        self::assertEquals(25, $iter->getReturn());
    }

    public function testRefIter(): void
    {
        $refIter = (new MutantRefIterator())(10);
        $sum = 0;
        foreach ($refIter as $key => &$value) {
            $value += 5;
            $sum += $value;
        }
        unset($value);
        self::assertEquals(18, $sum);
    }
}