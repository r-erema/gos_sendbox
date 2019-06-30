<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Post;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\EventStore;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\EventStream;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Projector\Projector;
use ReflectionException;

class EventRepository extends EntityRepository implements PostRepository
{

    /** @var EventStore */
    private $eventStore;
    /** @var Projector */
    private $projector;


    /**
     * @param Post $post
     * @throws ReflectionException
     */
    public function save(Post $post): void
    {
        $events = $post->getRecordedEvents();
        $this->eventStore->append(new EventStream($post->getId(), $events));
        $post->clearEvents();

        $this->projector->project($events);
    }

    public function byId(PostId $id): ?Post
    {
        return Post::reconstitute($this->eventStore->getEventsFor($id));
    }

    public function setProjector(Projector $projector): void
    {
        $this->projector = $projector;
    }

    public function setEventStore(EventStore $eventStore): void
    {
        $this->eventStore = $eventStore;
    }

}