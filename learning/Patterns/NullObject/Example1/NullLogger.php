<?php

declare(strict_types=1);

namespace learning\Patterns\NullObject\Example1;

class NullLogger implements LoggerInterface
{
    public function log(string $str): void
    {
    }
}
