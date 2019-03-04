<?php

namespace learning\Patterns\SimpleFactory\Example1\Bicycle\Tests;

use learning\Patterns\SimpleFactory\Example1\Bicycle,
    learning\Patterns\SimpleFactory\Example1\SimpleFactory,
    PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{

    public function testSimpleFactory(): void
    {
        $bicycle = (new SimpleFactory())->createBicycle();
        $this->assertEquals(Bicycle::class, get_class($bicycle));
    }
}