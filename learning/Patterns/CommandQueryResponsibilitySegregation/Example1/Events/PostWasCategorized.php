<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\CategoryId;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Event;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class PostWasCategorized extends Event
{

    private $postId;
    private $categoryId;

    public function __construct(PostId $postId, CategoryId $categoryId)
    {
        parent::__construct();
        $this->postId = $this->aggregateId = $postId;
        $this->categoryId = $categoryId;
    }

    public function getCategoryId(): CategoryId
    {
        return $this->categoryId;
    }
}