<?php

declare(strict_types=1);

namespace learning\other\Coroutines\Example2;

use Generator;

class Task
{

    private Generator $generator;
    private bool $started = false;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function run(): ?string
    {
        if ($this->started) {
            $this->generator->next();
        }
        $this->started = true;
        return $this->generator->current();
    }

    public function finished(): bool
    {
        return !$this->generator->valid();
    }

}
