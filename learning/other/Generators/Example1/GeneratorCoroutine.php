<?php

namespace learning\other\Generators\Example1;

use Generator;
class GeneratorCoroutine
{
    public static function xrange($start, $end, $step): Generator
    {
        for ($i = $start; $i <= $end; $i += $step) {
            yield $i;
        }
    }

    public static function logger($fileName): Generator
    {
        if (!isset($_SERVER[$fileName])) {
            $GLOBALS[$fileName] = '';
        }

        while (true) {
            $GLOBALS[$fileName] .= yield;
        }
    }

    public static function gen(): Generator
    {
        $GLOBALS['gen'] = '';
        $GLOBALS['gen'] .= yield 'yield1';
        $GLOBALS['gen'] .= yield 'yield2';
    }
}
