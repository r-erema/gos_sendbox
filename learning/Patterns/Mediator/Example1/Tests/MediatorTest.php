<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1\Tests;

use learning\Patterns\Mediator\Example1\Client;
use learning\Patterns\Mediator\Example1\Database;
use learning\Patterns\Mediator\Example1\Mediator;
use learning\Patterns\Mediator\Example1\Server;
use PHPUnit\Framework\TestCase;

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
