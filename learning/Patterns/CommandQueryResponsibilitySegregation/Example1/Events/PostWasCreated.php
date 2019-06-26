<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Event;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class PostWasCreated extends Event
{

    private $postId;
    private $title;
    private $content;

    public function __construct(string $postId, string $title, string $content)
    {
        parent::__construct();
        $this->postId = $this->aggregateId = $postId;
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