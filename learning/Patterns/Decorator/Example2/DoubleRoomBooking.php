<?php

declare(strict_types=1);

namespace learning\Patterns\Decorator\Example2;

class DoubleRoomBooking implements Booking
{
    public function calculatePrice(): int
    {
        return 40;
    }

    public function getDescription(): string
    {
        return 'double room';
    }
}
