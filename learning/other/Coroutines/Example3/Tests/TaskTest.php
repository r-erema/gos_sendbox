<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example3\Tests;

use learning\other\Coroutines\Example3\Runner;
use learning\other\Coroutines\Example3\Worker;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{

    public function testMultiplier(): void
    {
        $runner = new Runner();

        $result = 0;

        $runner->addWorker('adder', new Worker(call_user_func(static function () use (&$result) {
            while (true) {
                $number = yield;
                $result += $number;
            }
        })));

        $runner->addWorker('multiplier', new Worker(call_user_func(static function () use (&$result) {
            while (true) {
                $number = yield;
                $result *= $number;
            }
        })));

        $runner->addWorker('reducer', new Worker(call_user_func(static function () use (&$result) {
            while (true) {
                $number = yield;
                $result -= $number;
            }
        })));

        $runner->run('adder', 2);
        $runner->run('adder', 2);
        $runner->run('multiplier', 4);
        $runner->run('reducer', 11);

        $this->assertEquals(5, $result);
    }

}
