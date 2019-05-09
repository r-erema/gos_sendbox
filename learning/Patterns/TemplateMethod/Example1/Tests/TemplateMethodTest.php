<?php

declare(strict_types=1);

namespace learning\Patterns\TemplateMethod\Example1\Tests;

use learning\Patterns\TemplateMethod\Example1\BeachJourney;
use learning\Patterns\TemplateMethod\Example1\CityJourney;
use PHPUnit\Framework\TestCase;

class TemplateMethodTest extends TestCase
{
    public function testCanGetOnVacationOnTheBeach(): void
    {
        $beachJourney = new BeachJourney();
        $beachJourney->takeATrip();

        $this->assertEquals(
            ['Buy a flight ticket', 'Taking the plane', 'Swimming and sun-bathing', 'Taking the plane'],
            $beachJourney->getThingsToDo()
        );
    }

    public function testCanGetOnAJourneyToACity(): void
    {
        $beachJourney = new CityJourney();
        $beachJourney->takeATrip();

        $this->assertEquals(
            [
                'Buy a flight ticket',
                'Taking the plane',
                'Eat, drink, take photos and sleep',
                'Buy a gift',
                'Taking the plane'
            ],
            $beachJourney->getThingsToDo()
        );
    }
}
