<?php

declare(strict_types=1);

namespace learning\Patterns\Bridge\Example1;

class HelloWorldService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('Hello World');
    }
}