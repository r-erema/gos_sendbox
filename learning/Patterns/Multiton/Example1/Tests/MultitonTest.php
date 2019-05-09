<?php

declare(strict_types=1);

namespace learning\Patterns\Multiton\Example1\Tests;

use learning\Patterns\Multiton\Example1\Multiton;
use PHPUnit\Framework\TestCase;

class MultitonTest extends TestCase
{
    public function testMultiton(): void
    {
        $instance1 = Multiton::getInstance('1');
        $instance2 = Multiton::getInstance('2');

        $this->assertNotSame($instance1, $instance2);
        $this->assertSame($instance1, Multiton::getInstance('1'));
        $this->assertSame($instance2, Multiton::getInstance('2'));
    }
}
