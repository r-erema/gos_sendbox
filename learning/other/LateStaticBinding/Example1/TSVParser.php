<?php

declare(strict_types=1);

namespace learning\other\LateStaticBinding\Example1;

class TSVParser extends GenericParser
{
    public static function getTokens(): array
    {
        return [
            GenericParser::EOL => PHP_EOL,
            GenericParser::SEPARATOR => "\t",
            GenericParser::ENCLOSED_CHAR => "'"
        ];
    }
}
