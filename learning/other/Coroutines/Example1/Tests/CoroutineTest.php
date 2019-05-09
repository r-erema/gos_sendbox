<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example1\Tests;

use Generator;
use learning\other\Coroutines\Example1\SystemCall;
use learning\other\Coroutines\Example1\Task;
use PHPUnit\Framework\TestCase;
use learning\other\Coroutines\Example1\Scheduler;

class CoroutineTest extends TestCase
{
    public function testCoroutine(): void
    {
        $scheduler = new Scheduler();
        $scheduler->newTask((static function (): Generator {
            for ($i = 1; $i <= 10; ++$i) {
                echo "This is task 1 iteration {$i}." . PHP_EOL;
                yield;
            }
        })());
        $scheduler->newTask((static function (): Generator {
            for ($i = 1; $i <= 5; ++$i) {
                echo "This is task 2 iteration {$i}." . PHP_EOL;
                yield;
            }
        })());
        $this->expectOutputString(self::output());
        $scheduler->run();
    }

    public function testSystemCall(): void
    {
        $scheduler = new Scheduler();
        $taskCoroutine = static function (int $max): Generator {
            $tid = (yield self::getTaskId());
            for ($i = 1; $i <= $max; $i++) {
                echo "This is task {$tid} iteration {$i}." . PHP_EOL;
                yield;
            }
        };

        $scheduler->newTask($taskCoroutine(10));
        $scheduler->newTask($taskCoroutine(5));

        $this->expectOutputString(self::output());
        $scheduler->run();
    }

    private static function output(): string
    {
        $outputRows = [
            'This is task 1 iteration 1.',
            'This is task 2 iteration 1.',
            'This is task 1 iteration 2.',
            'This is task 2 iteration 2.',
            'This is task 1 iteration 3.',
            'This is task 2 iteration 3.',
            'This is task 1 iteration 4.',
            'This is task 2 iteration 4.',
            'This is task 1 iteration 5.',
            'This is task 2 iteration 5.',
            'This is task 1 iteration 6.',
            'This is task 1 iteration 7.',
            'This is task 1 iteration 8.',
            'This is task 1 iteration 9.',
            'This is task 1 iteration 10.' . PHP_EOL
        ];
        return implode(PHP_EOL, $outputRows);
    }

    public function testNewTaskAndKillTask(): void
    {
        $childTaskCoroutine = static function (): Generator {
            $tid = (yield self::getTaskId());
            while (true) {
                echo "Child task {$tid} still alive!" . PHP_EOL;
                yield;
            }
        };

        $taskCoroutine = static function () use ($childTaskCoroutine): Generator {
            $tid = (yield self::getTaskId());
            $childTid = (yield self::newTask($childTaskCoroutine()));

            for ($i = 1; $i <= 6; ++$i) {
                echo "Parent task {$tid} iteration {$i}.\n";
                yield;

                if ($i === 3) {
                    yield self::killTask($childTid);
                }
            }
        };
        $scheduler = new Scheduler();
        $scheduler->newTask($taskCoroutine());

        $outputRows = [
            'Parent task 1 iteration 1.',
            'Child task 2 still alive!',
            'Parent task 1 iteration 2.',
            'Child task 2 still alive!',
            'Parent task 1 iteration 3.',
            'Child task 2 still alive!',
            'Parent task 1 iteration 4.',
            'Parent task 1 iteration 5.',
            'Parent task 1 iteration 6.' . PHP_EOL
        ];
        $this->expectOutputString(implode(PHP_EOL, $outputRows));

        $scheduler->run();
    }

    private static function getTaskId(): SystemCall
    {
        return new SystemCall(static function (Task $task, Scheduler $scheduler) {
            $task->setSendValue($task->getTaskId());
            $scheduler->schedule($task);
        });
    }

    private static function newTask(Generator $coroutine): SystemCall
    {
        return new SystemCall(static function (Task $task, Scheduler $scheduler) use ($coroutine) {
            $task->setSendValue($scheduler->newTask($coroutine));
            $scheduler->schedule($task);
        });
    }

    private static function killTask(int $taskId): SystemCall
    {
        return new SystemCall(static function (Task $task, Scheduler $scheduler) use ($taskId) {
            $task->setSendValue($scheduler->killTask($taskId));
            $scheduler->schedule($task);
        });
    }
}
