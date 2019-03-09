<?php

declare(strict_types=1);

namespace learning\Patterns\NullObject\Example1;

class PrintLogger implements LoggerInterface
{
    public function log(string $str): void
    {
       echo $str;
    }
}