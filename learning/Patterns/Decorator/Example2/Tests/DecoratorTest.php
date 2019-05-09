<?php

declare(strict_types=1);

namespace learning\Patterns\Decorator\Example2\Tests;

use learning\Patterns\Decorator\Example2\DoubleRoomBooking;
use learning\Patterns\Decorator\Example2\ExtraBed;
use learning\Patterns\Decorator\Example2\WiFi;
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    public function testCanCalculatePriceForBasicDoubleRoomBooking(): void
    {
        $booking = new DoubleRoomBooking();
        $this->assertEquals(40, $booking->calculatePrice());
        $this->assertEquals('double room', $booking->getDescription());
    }

    public function testCanCalculatePriceForDoubleRoomBookingWithWiFi(): void
    {
        $booking = new DoubleRoomBooking();
        $booking = new WiFi($booking);

        $this->assertEquals(42, $booking->calculatePrice());
        $this->assertEquals('double room with wifi', $booking->getDescription());
    }

    public function testCanCalculatePriceForDoubleRoomBookingWithWiFiAndExtraBed(): void
    {
        $booking = new DoubleRoomBooking();
        $booking = new WiFi($booking);
        $booking = new ExtraBed($booking);

        $this->assertEquals(72, $booking->calculatePrice());
        $this->assertEquals('double room with wifi with extra bed', $booking->getDescription());
    }
}
