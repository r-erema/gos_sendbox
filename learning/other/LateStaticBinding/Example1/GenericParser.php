<?php

declare(strict_types=1);

namespace learning\other\LateStaticBinding\Example1;

abstract class GenericParser
{

    public const EOL = 'eol';
    public const SEPARATOR = 'separator';
    public const ENCLOSED_CHAR = 'enclosed_char';

    abstract public static function getTokens(): array;

    public function convertTextToArray(string $data): array
    {
        $tokens = static::getTokens();
        return array_map(fn (string $line): array => array_map(
            fn (string $column): string => trim($column, $tokens[self::ENCLOSED_CHAR]),
            explode($tokens[self::SEPARATOR], $line)
        ), explode($tokens[self::EOL], $data));
    }

}
