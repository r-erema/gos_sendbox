<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1\Tests;

use learning\Patterns\Mediator\Example1\Client,
    learning\Patterns\Mediator\Example1\Database,
    learning\Patterns\Mediator\Example1\Mediator,
    learning\Patterns\Mediator\Example1\Server,
    PHPUnit\Framework\TestCase;

class MediatorTest extends TestCase
{
    public function testOutputHelloWorld(): void
    {
        $client = new Client();
        new Mediator(new Server(), new Database(), $client);
        $this->expectOutputString('Hello World');
        $client->request();
    }
}