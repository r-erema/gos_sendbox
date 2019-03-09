<?php

declare(strict_types=1);

namespace learning\Patterns\NullObjectTest\Example1\Tests;

use PHPUnit\Framework\TestCase,
    learning\Patterns\NullObject\Example1\NullLogger,
    learning\Patterns\NullObject\Example1\PrintLogger,
    learning\Patterns\NullObject\Example1\Service;

class NullObjectTest extends TestCase
{

    public function testNullObject(): void
    {
        $service = new Service(new NullLogger());
        $this->expectOutputString('');
        $service->doSomething();
    }

    public function testStandardLogger(): void
    {
        $service = new Service(new PrintLogger());
        $this->expectOutputString('We are in ' . Service::class . '::doSomething');
        $service->doSomething();
    }

}