<?php

declare(strict_types=1);

namespace learning\Patterns\Facade\Example1\Tests;

use learning\Patterns\Facade\Example1\BiosInterface,
    learning\Patterns\Facade\Example1\Facade,
    learning\Patterns\Facade\Example1\OsInterface,
    PHPUnit\Framework\MockObject\MockObject,
    PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{

    /** @throws \ReflectionException */
    public function testComputerOn(): void
    {
        /** @var OsInterface|MockObject $os */
        $os = $this->createMock(OsInterface::class);
        $os->method('getName')->willReturn('Linux');

         /** @var BiosInterface|MockObject $bios */
        $bios = $this->getMockBuilder(BiosInterface::class)
                     ->setMethods(['launch', 'execute', 'waitForKeyPress'])
                     ->disableAutoload()
                     ->getMock();

        $bios->expects($this->once())
             ->method('launch')
             ->with($os);

        $facade = new Facade($bios, $os);
        $facade->turnOn();
        $this->assertEquals('Linux', $os->getName());
    }
}
