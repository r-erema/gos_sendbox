<?php

declare(strict_types=1);

namespace learning\Patterns\WorkerPool\Example1\Tests;

use learning\Patterns\Pool\Example1\WorkerPool,
    PHPUnit\Framework\TestCase;

class Pool extends TestCase
{

    /**  @throws \Exception */
    public function testPool(): void
    {
        $pool = new WorkerPool();
        $worker1 = $pool->get();
        $worker2 = $pool->get();

        $this->assertCount(2, $pool);
        $this->assertNotSame($worker1, $worker2);
    }

    /** @throws \Exception */
    public function testCanGetSameInstanceTwiceWhenDisposingItFirst(): void
    {
        $pool = new WorkerPool();
        $worker1 = $pool->get();
        $pool->dispose($worker1);
        $worker2 = $pool->get();

        $this->assertCount(1, $pool);
        $this->assertSame($worker1, $worker2);
    }

}
