<?php

declare(strict_types=1);

namespace learning\Patterns\FactoryMethod\Example1;

interface LoggerFactory
{
    public function createLogger(): Logger;
}
