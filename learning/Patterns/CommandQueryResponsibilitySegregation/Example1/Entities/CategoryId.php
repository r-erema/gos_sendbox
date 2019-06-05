<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities;

class CategoryId
{

    public static function create(): self
    {
        return new self();
    }

    public static function generate(): string
    {
        return uniqid('', true);
    }
}