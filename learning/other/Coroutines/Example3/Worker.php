<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example3;

use Generator;

class Worker
{

    private Generator $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function run(int $number): void
    {
        $this->generator->send($number);
    }

}
