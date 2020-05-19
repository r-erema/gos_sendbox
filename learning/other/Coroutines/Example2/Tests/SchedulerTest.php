<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example2\Tests;

use learning\other\Coroutines\Example2\Scheduler;
use learning\other\Coroutines\Example2\Task;
use PHPUnit\Framework\TestCase;

class SchedulerTest extends TestCase
{

    public function testScheduler(): void
    {
        $scheduler = new Scheduler();
        $limit = 3;
        $scheduler->enqueue(new Task(call_user_func(static function () use ($limit) {
           for ($i = 0; $i < $limit; $i++) {
               yield "Task 1 operation result: {$i}";
           }
        })));
        $scheduler->enqueue(new Task(call_user_func(static function () use ($limit)  {
            for ($i = 0; $i < $limit; $i++) {
                yield "Task 2 operation result: {$i}";
            }
        })));
        $scheduler->enqueue(new Task(call_user_func(static function () use ($limit)  {
            for ($i = 0; $i < $limit; $i++) {
                yield "Task 3 operation result: {$i}";
            }
        })));
        $this->assertEquals(
            [
            'Task 1 operation result: 0',
            'Task 2 operation result: 0',
            'Task 3 operation result: 0',
            'Task 1 operation result: 1',
            'Task 2 operation result: 1',
            'Task 3 operation result: 1',
            'Task 1 operation result: 2',
            'Task 2 operation result: 2',
            'Task 3 operation result: 2'
            ],
            $scheduler->run()
        );
    }

}
