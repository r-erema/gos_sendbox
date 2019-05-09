<?php

declare(strict_types=1);

namespace learning\Patterns\Facade\Example1;

class Facade
{
    private $os;
    private $bios;

    public function __construct(BiosInterface $bios, OsInterface $os)
    {
        $this->bios = $bios;
        $this->os= $os;
    }

    public function turnOn(): void
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    public function turnOff(): void
    {
        $this->os->halt();
        $this->bios->powerDown();
    }
}
