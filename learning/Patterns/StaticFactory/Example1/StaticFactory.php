<?php

declare(strict_types=1);

namespace learning\Patterns\StaticFactory\Example1;

final class StaticFactory
{
    public static function factory(string $type): FormatterInterface
    {
        switch ($type) {
            case 'number': {
                return new FormatNumber();
            }
            case 'string': {
                return new FormatString();
            }
            default: throw new \InvalidArgumentException('Unknown format given');
        }
    }
}
