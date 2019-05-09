<?php

declare(strict_types=1);

namespace learning\Patterns\Builder\Example1;

use learning\Patterns\Builder\Example1\Parts\Door;
use learning\Patterns\Builder\Example1\Parts\Engine;
use learning\Patterns\Builder\Example1\Parts\Truck;
use learning\Patterns\Builder\Example1\Parts\Wheel;

class TruckBuilder implements BuilderInterface
{

    /** @var Truck */
    private $truck;

    public function createVehicle(): void
    {
        $this->truck = new Truck();
    }
    public function addWheel(): void
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
        $this->truck->setPart('wheel4', new Wheel());
        $this->truck->setPart('wheel5', new Wheel());
        $this->truck->setPart('wheel6', new Wheel());
    }
    public function addEngine(): void
    {
        $this->truck->setPart('truckEngine', new Engine());
    }
    public function addDoors(): void
    {
        $this->truck->setPart('rightDoor', new Door());
        $this->truck->setPart('rightLeft', new Door());
    }
    public function getVehicle(): Vehicle
    {
        return $this->truck;
    }
}
