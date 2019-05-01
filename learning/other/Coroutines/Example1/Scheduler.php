<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example1;

use Generator,
    SplQueue;

class Scheduler
{

    protected $maxTaskId = 0,
              $taskMap = [],
              $taskQueue,
              $waitingForRead,
              $waitingForWrite;

    public function __construct()
    {
        $this->taskQueue = new SplQueue();
    }

    public function newTask(Generator $coroutine): int
    {
        $tid = ++$this->maxTaskId;
        $task = new Task($tid, $coroutine);
        $this->taskMap[$tid] = $task;
        $this->schedule($task);
        return $tid;
    }

    public function killTask(int $tid): bool
    {
        if (!isset($this->taskMap[$tid])) {
            return false;
        }
        unset($this->taskMap[$tid]);

        /** @var Task $task */
        foreach ($this->taskQueue as $i => $task) {
            if ($task->getTaskId() === $tid) {
                unset($this->taskQueue[$i]);
                break;
            }
        }

        return true;
    }

    public function waitForRead($socket, Task $task): void
    {
        if (isset($this->waitingForRead[(int) $socket])) {
            $this->waitingForRead[(int) $socket][1][] = $task;
        } else {
            $this->waitingForRead[(int) $socket] = [$socket, [$task]];
        }
    }

    public function waitForWrite($socket, Task $task): void
    {
        if (isset($this->waitingForWrite[(int) $socket])) {
            $this->waitingForWrite[(int) $socket][1][] = $task;
        } else {
            $this->waitingForWrite[(int) $socket] = [$socket, [$task]];
        }
    }

    public function schedule(Task $task): void
    {
        $this->taskQueue->enqueue($task);
    }

    public function run(): void
    {
        while (!$this->taskQueue->isEmpty()) {
            /** @var Task $task */
            $task = $this->taskQueue->dequeue();
            $retVal = $task->run();

            if ($retVal instanceof SystemCall) {
                $retVal($task, $this);
                continue;
            }

            if ($task->isFinished()) {
                unset($this->taskMap[$task->getTaskId()]);
            } else {
                $this->schedule($task);
            }
        }
    }

}