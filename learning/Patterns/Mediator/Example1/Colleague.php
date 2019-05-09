<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1;

abstract class Colleague
{
    /**
     * @var MediatorInterface
     */
    protected $mediator;

    public function setMediator(MediatorInterface $mediator): void
    {
        $this->mediator = $mediator;
    }
}
