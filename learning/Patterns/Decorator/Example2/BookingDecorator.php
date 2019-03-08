<?php

declare(strict_types=1);

namespace learning\Patterns\Decorator\Example2;

abstract class BookingDecorator implements Booking
{
    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

}