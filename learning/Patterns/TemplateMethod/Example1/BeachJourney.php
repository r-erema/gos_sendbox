<?php

declare(strict_types=1);

namespace learning\Patterns\TemplateMethod\Example1;

class BeachJourney extends Journey
{

    protected function enjoyVacation(): string
    {
        return 'Swimming and sun-bathing';
    }

}