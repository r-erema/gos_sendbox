<?php
declare(strict_types=1);

namespace learning\Patterns\Builder\Tests;

use learning\Patterns\Builder\Example1\CarBuilder;
use learning\Patterns\Builder\Example1\Director;
use learning\Patterns\Builder\Example1\Parts\Car;
use learning\Patterns\Builder\Example1\Parts\Truck;
use learning\Patterns\Builder\Example1\TruckBuilder;
use PHPUnit\Framework\TestCase;

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
