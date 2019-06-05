<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;

class PostWasPublished implements DomainEvent
{

    private $postId;

    public function __construct(PostId $postId)
    {
        $this->postId = $postId;
    }
}