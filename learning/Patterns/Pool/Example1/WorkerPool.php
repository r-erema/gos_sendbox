<?php

declare(strict_types=1);

namespace learning\Patterns\Pool\Example1;

class WorkerPool implements \Countable
{
    private $occupiedWorker = [];
    private $freeWorkers = [];

    /** @throws \Exception */
    public function get(): StringReverseWorker
    {
        if (count($this->freeWorkers) === 0) {
            $worker = new StringReverseWorker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }
        $this->occupiedWorker[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    public function dispose(StringReverseWorker $worker): void
    {
        $key = spl_object_hash($worker);
        if (isset($this->occupiedWorker[$key])) {
            unset($this->occupiedWorker[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    public function count(): int
    {
        return count($this->occupiedWorker) + count($this->freeWorkers);
    }
}
