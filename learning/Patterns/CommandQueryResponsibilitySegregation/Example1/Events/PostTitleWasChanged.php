<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;

class PostTitleWasChanged implements DomainEvent
{


    private $postId;
    private $title;

    public function __construct(PostId $postId, string $title)
    {
        $this->postId = $postId;
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}