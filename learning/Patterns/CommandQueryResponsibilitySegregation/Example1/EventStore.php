<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
class EventStore
{

    public function append(EventStream $eventStream): void
    {

    }

    public function getEventsFor(PostId $postId): EventStream
    {

    }

}