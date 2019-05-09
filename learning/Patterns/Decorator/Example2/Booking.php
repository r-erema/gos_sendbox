<?php

declare(strict_types=1);

namespace learning\Patterns\Decorator\Example2;

interface Booking
{
    public function calculatePrice(): int;
    public function getDescription(): string ;
}
