<?php

declare(strict_types=1);

namespace learning\Patterns\TemplateMethod\Example1;

class CityJourney extends Journey
{

    protected function enjoyVacation(): string
    {
        return 'Eat, drink, take photos and sleep';
    }

    protected function buyGift(): string
    {
        return 'Buy a gift';
    }

}