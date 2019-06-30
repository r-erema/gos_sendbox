<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;

class EventStream
{

    public function __construct(PostId $id, array $events)
    {

    }

    public function getAggregateId(): PostId
    {

    }
}