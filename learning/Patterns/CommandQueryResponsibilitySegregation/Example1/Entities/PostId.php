<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities;

class PostId
{

    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(): self
    {
        return new self(self::generate());
    }

    public static function generate(): string
    {
        return uniqid('', true);
    }

    public function __toString(): string
    {
        return $this->value;
    }

}