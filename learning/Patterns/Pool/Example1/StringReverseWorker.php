<?php

declare(strict_types=1);

namespace learning\Patterns\Pool\Example1;

class StringReverseWorker
{
    private $createdAt;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function run(string $text): string
    {
        return strrev($text);
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}
