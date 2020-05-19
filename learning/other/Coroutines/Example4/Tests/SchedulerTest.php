<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example4\Tests;

use learning\other\Coroutines\Example3\Runner;
use learning\other\Coroutines\Example3\Worker;
use learning\other\Coroutines\Example4\Job;
use learning\other\Coroutines\Example4\Scheduler;
use PHPUnit\Framework\TestCase;

class SchedulerTest extends TestCase
{

    public function testMultiplier(): void
    {
        $scheduler = new Scheduler();

        $order = 0;

        $scheduler->addJob('j1', new Job(static function () use (&$order) {
            ++$order;
            usleep(1000 * 3);
            return [
                'result' => sprintf('Job 1 result: %s', time()),
                'order' => $order
            ];
        }));

        $scheduler->addJob('j2', new Job(static function () use (&$order) {
            ++$order;
            usleep(1000);
            return [
                'result' => sprintf('Job 2 result: %s', time()),
                'order' => $order
            ];
        }));

        $scheduler->runJobDuringMilliseconds('j1', 10);
        $scheduler->runJobDuringMilliseconds('j2', 20);
        $scheduler->runJobDuringMilliseconds('j1', 5);

        $job1Result = $scheduler->stopJobAndGetResult('j1');
        $job2Result = $scheduler->stopJobAndGetResult('j2');

        $getMaxOrder = static function (array $result): int {
            $orders = array_map(static fn (array $item): int  => $item['order'], $result);
            return max($orders);
        };
        $getMinOrder = static function (array $result): int {
            $orders = array_map(static fn (array $item): int  => $item['order'], $result);
            return min($orders);
        };

        $this->assertLessThan($getMinOrder($job2Result), $getMinOrder($job1Result));
        $this->assertGreaterThan($getMaxOrder($job2Result), $getMaxOrder($job1Result));
    }

}
