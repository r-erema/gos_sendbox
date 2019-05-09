<?php

declare(strict_types=1);

namespace learning\Patterns\NullObject\Example1;

interface LoggerInterface
{
    public function log(string $str): void;
}
