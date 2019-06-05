<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

class AggregateRoot
{

    private $recordedEvents = [];

    protected function recordApplyAndPublishThat(DomainEvent $domainEvent): void
    {
        $this->recordThat($domainEvent);
        $this->applyThat($domainEvent);
        $this->publishThat($domainEvent);
    }

    protected function recordThat(DomainEvent $domainEvent): void
    {
        $this->recordedEvents[] = $domainEvent;
    }

    protected function applyThat(DomainEvent $domainEvent): void
    {
        $modifier = 'apply' . get_class($domainEvent);
        $this->$modifier($domainEvent);
    }

    protected function publishThat(DomainEvent $domainEvent): void
    {
        DomainEventPublisher::getInstance()->publish($domainEvent);
    }

    public function getRecordedEvents(): array
    {
        return $this->recordedEvents;
    }

    public function clearEvents(): void
    {
        $this->recordedEvents = [];
    }

}