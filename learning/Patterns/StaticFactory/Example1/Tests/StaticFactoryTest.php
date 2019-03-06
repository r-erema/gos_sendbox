<?php

namespace learning\Patterns\StaticFactory\Example1\Tests;

use learning\Patterns\StaticFactory\Example1\FormatNumber,
    learning\Patterns\StaticFactory\Example1\FormatString,
    learning\Patterns\StaticFactory\Example1\StaticFactory,
    PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase
{

    public function testCanCreateNumberFormatter(): void
    {
        $this->assertInstanceOf(FormatNumber::class, StaticFactory::factory('number'));
    }

    public function testCanCreateStringFormatter(): void
    {
        $this->assertInstanceOf(FormatString::class, StaticFactory::factory('string'));
    }

    public function testInvalidArgument(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        StaticFactory::factory('object');
    }

}