<?php

declare(strict_types=1);

namespace learning\Patterns\Command\Example1\Tests;

use learning\Patterns\Command\Example1\HelloCommand,
    learning\Patterns\Command\Example1\Invoker,
    learning\Patterns\Command\Example1\Receiver,
    PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function testInvocation(): void
    {
        $invoker = new Invoker();
        $receiver = new Receiver();
        $invoker->setCommand(new HelloCommand($receiver));
        $invoker->run();
        $this->assertEquals('Hello World', $receiver->getOutput());
    }
}