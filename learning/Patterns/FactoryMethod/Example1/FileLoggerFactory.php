<?php

declare(strict_types=1);

namespace learning\Patterns\FactoryMethod\Example1;

class FileLoggerFactory implements LoggerFactory
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogger(): Logger
    {
        return new FileLogger($this->filePath);
    }
}
