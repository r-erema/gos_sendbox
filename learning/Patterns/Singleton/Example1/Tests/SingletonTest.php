<?php

namespace learning\Patterns\Singleton\Example1\Tests;

use learning\Patterns\Singleton\Example1\Singleton,
    PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{

    public function testSingleton(): void
    {
        $firstCall = Singleton::getInstance();
        $secondCall = Singleton::getInstance();
        $this->assertSame($firstCall, $secondCall);
    }
}