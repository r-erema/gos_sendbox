<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example2;

use SplQueue;

class Scheduler
{

    private SplQueue $queue;

    public function __construct()
    {
        $this->queue = new SplQueue();
    }

    public function enqueue(Task $task): void
    {
        $this->queue->enqueue($task);
    }

    public function run(): array
    {
        $result = [];
        while (!$this->queue->isEmpty()) {
            /** @var Task $task */
            $task = $this->queue->dequeue();
            if (null !== ($taskResult = $task->run())) {
                $result[] = $taskResult;
            }

            if (!$task->finished()) {
                $this->enqueue($task);
            }
        }
        return $result;
    }

}
