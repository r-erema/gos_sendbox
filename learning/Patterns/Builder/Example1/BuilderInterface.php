<?php

declare(strict_types=1);

namespace learning\Patterns\Builder\Example1;

interface BuilderInterface
{
    public function createVehicle(): void;

    public function addWheel(): void;

    public function addEngine(): void;

    public function addDoors(): void;

    public function getVehicle(): Vehicle;
}
