<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Event;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class PostContentWasChanged extends Event
{


    private $postId;
    private $content;

    public function __construct(PostId $postId, string $content)
    {
        parent::__construct();
        $this->postId = $this->aggregateId = $postId;
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getPostId(): PostId
    {
        return $this->postId;
    }
}