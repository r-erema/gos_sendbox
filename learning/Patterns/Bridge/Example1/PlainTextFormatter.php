<?php

declare(strict_types=1);

namespace learning\Patterns\Bridge\Example1;

class PlainTextFormatter implements FormatterInterface
{
    public function format(string $text): string
    {
        return $text;
    }
}
