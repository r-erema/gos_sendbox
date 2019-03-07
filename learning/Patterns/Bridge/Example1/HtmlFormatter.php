<?php

declare(strict_types=1);

namespace learning\Patterns\Bridge\Example1;

class HtmlFormatter implements FormatterInterface
{
    public function format(string $text): string
    {
        return sprintf('<p>%s</p>', $text);
    }
}