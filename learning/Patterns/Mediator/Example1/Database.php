<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1;

class Database extends Colleague
{
    public function getData(): string
    {
        return 'World';
    }
}
