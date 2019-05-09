<?php

declare(strict_types=1);

namespace learning\Patterns\NullObject\Example1;

class Service
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function doSomething(): void
    {
        $this->logger->log('We are in ' . __METHOD__);
    }
}
