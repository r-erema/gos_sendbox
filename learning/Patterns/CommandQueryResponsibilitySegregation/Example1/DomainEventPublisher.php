<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

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