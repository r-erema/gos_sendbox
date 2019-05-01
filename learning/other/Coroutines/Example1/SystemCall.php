<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example1;


class SystemCall
{

    protected $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function __invoke(Task $task, Scheduler $scheduler)
    {
        $callback = $this->callback;
        return $callback($task, $scheduler);
    }

}