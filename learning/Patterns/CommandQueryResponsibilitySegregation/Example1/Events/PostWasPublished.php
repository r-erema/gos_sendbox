<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Event;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class PostWasPublished extends Event
{

    private $postId;

    public function __construct(PostId $postId)
    {
        parent::__construct();
        $this->postId = $this->aggregateId = $postId;
    }

    public function getPostId(): PostId
    {
        return $this->postId;
    }
}