<?php

namespace learning\Patterns\DataMapper\Builder\Tests;

use learning\Patterns\Builder\Example1\CarBuilder,
    learning\Patterns\Builder\Example1\Director,
    learning\Patterns\Builder\Example1\Parts\Car,
    learning\Patterns\Builder\Example1\Parts\Truck,
    learning\Patterns\Builder\Example1\TruckBuilder,
    PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{

    public function testCanBuildTruck(): void
    {
        $truckBuilder = new TruckBuilder();
        $truck = (new Director())->build($truckBuilder);
        $this->assertInstanceOf(Truck::class, $truck);
    }

    public function testCanBuildCar(): void
    {
        $carBuilder = new CarBuilder();
        $car = (new Director())->build($carBuilder);
        $this->assertInstanceOf(Car::class, $car);
    }

}
