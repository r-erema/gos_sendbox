<?php

declare(strict_types=1);

namespace learning\other\LateStaticBinding\Example1;

class CSVParser extends GenericParser
{

    public static function getTokens(): array
    {
        return [
            GenericParser::EOL => PHP_EOL,
            GenericParser::SEPARATOR => ',',
            GenericParser::ENCLOSED_CHAR => '"'
        ];
    }

}
