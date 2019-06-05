<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

class PostWasCreated implements DomainEvent
{


    private $postId;
    private $title;
    private $content;

    public function __construct(string $postId, string $title, string $content)
    {
        $this->postId = $postId;
        $this->title = $title;
        $this->content = $content;
    }

    public function getPostId(): string
    {
        return $this->postId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }



}