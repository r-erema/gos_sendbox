<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1;

class Client extends Colleague
{
    public function request(): void
    {
        $this->mediator->makeRequest();
    }

    public function output(string $content): void
    {
        echo $content;
    }
}
