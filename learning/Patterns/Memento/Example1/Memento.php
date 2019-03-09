<?php

declare(strict_types=1);

namespace learning\Patterns\Memento\Example1;

class Memento
{

    private $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function getState(): State
    {
        return $this->state;
    }

}