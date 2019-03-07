<?php

declare(strict_types=1);

namespace learning\Patterns\Bridge\Example1;

abstract class Service
{

    protected $implementation;

    public function __construct(FormatterInterface $implementation)
    {
        $this->implementation = $implementation;
    }

    public function setImplementation(FormatterInterface $implementation): void
    {
        $this->implementation= $implementation;
    }

    abstract public function get(): string;
}