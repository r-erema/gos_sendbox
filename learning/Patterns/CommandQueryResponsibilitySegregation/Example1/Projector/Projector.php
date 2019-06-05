<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Projector;

use Doctrine\ORM\EntityManagerInterface;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasCreated;
use ReflectionClass;
use ReflectionException;

class Projector
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $events
     * @throws ReflectionException
     */
    public function project(array $events): void
    {
        foreach ($events as $event) {
            $reflection = new ReflectionClass($event);
            $projectMethod = "project{$reflection->getShortName()}";
            $this->$projectMethod($event);
        }
    }

    public function projectPostWasCreated(PostWasCreated $postWasCreatedEvent): void
    {
        $this->entityManager->flush();
    }

}