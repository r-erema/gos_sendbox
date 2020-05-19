<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example3;


class Runner
{

    /** @var Worker[] */
    private array $workers = [];

    public function addWorker(string $id, Worker $worker): self
    {
        $this->workers[$id] = $worker;
        return $this;
    }

    public function run(string $workerId, int $number): void
    {
        $this->workers[$workerId]->run($number);
    }

}
