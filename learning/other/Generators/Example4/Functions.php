<?php

declare(strict_types=1);

namespace learning\other\Generators\Example4;

use Generator;
use Iterator;

class Functions {

    public static function getLines(string $filePath): Generator
    {
        $f = fopen($filePath, 'rb');
        while ($line = fgets($f)) {
            yield $line;
        }
        fclose($f);
    }

    public static function fibonacciSequence(): Generator
    {
        $last = 0;
        $current = 1;
        yield 1;
        while (true) {
            $current += $last;
            $last = $current - $last;
            yield $current;
        }
    }

    public static function createLog(array &$storage): Generator
    {
        while (true) {
            $storage[] = yield;
        }
    }
}
