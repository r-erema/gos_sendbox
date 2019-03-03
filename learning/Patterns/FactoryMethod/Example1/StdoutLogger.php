<?php

declare(strict_types=1);

namespace learning\Patterns\FactoryMethod\Example1;

class StdoutLogger implements Logger
{

    public function log(string $message): void
    {
        echo $message;
    }

}