<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Event;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class PostTitleWasChanged extends Event
{


    private $postId;
    private $title;

    public function __construct(PostId $postId, string $title)
    {
        parent::__construct();
        $this->postId = $this->aggregateId = $postId;
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPostId(): PostId
    {
        return $this->postId;
    }
}