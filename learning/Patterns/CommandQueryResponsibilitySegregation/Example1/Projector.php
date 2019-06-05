<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\DomainEvent;

class Projector
{

    private $events;

    public function register(array $events): void
    {
        $this->events = $events;
    }


}