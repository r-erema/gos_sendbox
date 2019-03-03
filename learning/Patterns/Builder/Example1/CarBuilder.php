<?php

declare(strict_types=1);

namespace learning\Patterns\Builder\Example1;

use learning\Patterns\Builder\Example1\Parts\Car,
    learning\Patterns\Builder\Example1\Parts\Door,
    learning\Patterns\Builder\Example1\Parts\Engine,
    learning\Patterns\Builder\Example1\Parts\Wheel;

class CarBuilder implements BuilderInterface
{

    /** @var Car */
    private $car;

    public function createVehicle(): void
    {
        $this->car = new Car();
    }

    public function addWheel(): void
    {
        $this->car->setPart('wheelLF', new Wheel());
        $this->car->setPart('wheelRF', new Wheel());
        $this->car->setPart('wheelLR', new Wheel());
        $this->car->setPart('wheelRR', new Wheel());
    }

    public function addEngine(): void
    {
        $this->car->setPart('engine', new Engine());
    }

    public function addDoors(): void
    {
        $this->car->setPart('rightDoor', new Door());
        $this->car->setPart('rightLeft', new Door());
        $this->car->setPart('trunkLid', new Door());
    }

    public function getVehicle(): Vehicle
    {
        return $this->car;
    }
}