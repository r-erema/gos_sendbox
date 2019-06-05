<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\DomainEvent;

class DomainEventPublisher
{

    public static function getInstance(): self
    {
        return new self;
    }

    public function publish(DomainEvent $domainEvent): void
    {

    }

}