<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

interface EventSourcedAggregateRoot
{
    public static function reconstitute(EventStream $events);
}