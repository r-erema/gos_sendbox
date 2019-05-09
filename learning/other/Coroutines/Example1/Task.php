<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example1;

use Generator;

class Task
{
    protected $taskId;
    protected $coroutine;
    protected $sendValue;
    protected $beforeFirstYield = true;

    public function __construct(int $taskId, Generator $coroutine)
    {
        $this->taskId = $taskId;
        $this->coroutine = $coroutine;
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public function setSendValue($sendValue): void
    {
        $this->sendValue = $sendValue;
    }

    public function run()
    {
        if ($this->beforeFirstYield) {
            $this->beforeFirstYield = false;
            return $this->coroutine->current();
        }

        $retVal = $this->coroutine->send($this->sendValue);
        $this->sendValue = null;
        return $retVal;
    }

    public function isFinished(): bool
    {
        return !$this->coroutine->valid();
    }
}
