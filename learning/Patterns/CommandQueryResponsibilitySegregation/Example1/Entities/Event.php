<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\DomainEvent;

/**
 * @ORM\Entity(repositoryClass="learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories\EventRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\Table(name="events")
 * @ORM\DiscriminatorMap({
 *     "PostContentWasChanged" = "learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostContentWasChanged",
 *     "PostTitleWasChanged" = "learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostTitleWasChanged",
 *     "PostWasCategorized" = "learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasCategorized",
 *     "PostWasCreated" = "learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasCreated",
 *     "PostWasPublished" = "learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasPublished"
 * })
 */
abstract class Event implements DomainEvent
{

    /**
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="aggregate_id")
     */
    protected $aggregateId;

    /**
     * @ORM\Column(type="datetime_immutable", name="created_at")
     */
    private $cratedAt;

    /**
     * @ORM\Column(type="json")
     */
    private $data;

    public function __construct(DateTimeImmutable $createdAt = null)
    {
        $this->cratedAt = $createdAt ?: new DateTimeImmutable();
    }

    final public function getCratedAt(): DateTimeImmutable
    {
        return $this->cratedAt;
    }

    final public function setCratedAt(DateTimeImmutable $cratedAt): DomainEvent
    {
        $this->cratedAt = $cratedAt;
        return $this;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): DomainEvent
    {
        $this->data = $data;
        return $this;
    }

}