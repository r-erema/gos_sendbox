<?php

declare(strict_types=1);

namespace learning\Patterns\FactoryMethod\Example1;

class FileLogger implements Logger
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $message): void
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}
