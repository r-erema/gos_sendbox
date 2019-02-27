<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

abstract class AbstractBook
{
    abstract public function getAuthor(): string;
    abstract public function getTitle(): string;
}