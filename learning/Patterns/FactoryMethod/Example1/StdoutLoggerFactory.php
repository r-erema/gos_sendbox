<?php

declare(strict_types=1);

namespace learning\Patterns\FactoryMethod\Example1;

class StdoutLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}
