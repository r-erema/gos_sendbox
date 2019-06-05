<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

class PostWasCategorized implements DomainEvent
{


    private $postId;
    private $categoryId;

    public function __construct(PostId $postId, CategoryId $categoryId)
    {
        $this->postId = $postId;
        $this->categoryId = $categoryId;
    }

    public function getCategoryId(): CategoryId
    {
        return $this->categoryId;
    }
}