<?php

declare(strict_types=1);

namespace learning\Patterns\Bridge\Example1;

interface FormatterInterface
{
    public function format(string $text): string;
}
