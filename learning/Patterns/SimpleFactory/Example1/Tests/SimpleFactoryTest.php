<?php

declare(strict_types=1);

namespace learning\Patterns\SimpleFactory\Example1\Tests;

use learning\Patterns\SimpleFactory\Example1\Bicycle;
use learning\Patterns\SimpleFactory\Example1\SimpleFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    public function testSimpleFactory(): void
    {
        $bicycle = (new SimpleFactory())->createBicycle();
        $this->assertEquals(Bicycle::class, get_class($bicycle));
    }
}
