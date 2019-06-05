<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

class PostContentWasChanged implements DomainEvent
{


    private $postId;
    private $content;

    public function __construct(PostId $postId, string $content)
    {
        $this->postId = $postId;
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}