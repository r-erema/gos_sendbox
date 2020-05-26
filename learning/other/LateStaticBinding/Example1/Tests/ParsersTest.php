<?php

declare(strict_types=1);

namespace learning\other\LateStaticBinding\Example1\Tests;

use learning\other\LateStaticBinding\Example1\CSVParser;
use learning\other\LateStaticBinding\Example1\TSVParser;
use PHPUnit\Framework\TestCase;

class ParsersTest extends TestCase
{
    public function testCSVParser(): void
    {
        $csv = new CSVParser();
        $result = $csv->convertTextToArray(implode(PHP_EOL, ['"a","b","c"', '"1","2","3"']));
        $this->assertEquals([['a','b','c'],['1','2','3']], $result);
    }

    public function testTSVParser(): void
    {
        $csv = new TSVParser();
        $result = $csv->convertTextToArray(implode(PHP_EOL, ["'a'\t'b'\t'c'", "'1\t'2\t'3'"]));
        $this->assertEquals([['a','b','c'],['1','2','3']], $result);
    }
}
