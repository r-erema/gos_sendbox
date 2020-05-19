<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example4;


class Scheduler
{

    /** @var Job[] */
    private array $jobs = [];

    public function addJob(string $id, Job $job): self
    {
        $this->jobs[$id] = $job;
        return $this;
    }

    public function runJobDuringMilliseconds(string $jobId, int $milliseconds): void
    {
        $startTime = microtime(true);
        $finishTime = 0;
        while (($finishTime - $startTime) * 1000 < $milliseconds) {
            $this->jobs[$jobId]->run();
            $finishTime = microtime(true);
        }
    }

    public function stopJobAndGetResult(string $jobId): array
    {
        return $this->jobs[$jobId]->stop();
    }

}
