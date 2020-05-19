<?php

declare(strict_types=1);

namespace learning\other\Generators\Example4\Tests;

use learning\other\Generators\Example4\ArrayObject;
use learning\other\Generators\Example4\FileIterator;
use learning\other\Generators\Example4\Functions;
use PHPUnit\Framework\TestCase;

class GeneratorTestTest extends TestCase
{

    public function testCompareIteratorAndGenerator(): void
    {
        $filePath = __FILE__;
        $i = new FileIterator($filePath);
        $lines = [];
        foreach ($i as $line) {
            $lines[] = trim($line);
        }
        $this->assertNotEmpty($lines);

        $lines = [];
        foreach (Functions::getLines($filePath) as $line)
        {
            $lines[] = trim($line);
        }
        $this->assertNotEmpty($lines);
    }

    /**
     * @dataProvider fibonacciSequenceDataProvider
     * @param int $limit
     * @param int $result
     */
    public function fibonacciSequence(int $limit, int $result): void
    {
        $i = 0;
        $lastNumber = null;
        foreach (Functions::fibonacciSequence() as $lastNumber) {
            $i++;
            if ($i === $limit) {
                break;
            }
        }
        $this->assertEquals($result, $lastNumber);
    }

    public static function fibonacciSequenceDataProvider(): array
    {
        return [
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 3],
            [5, 5],
            [6, 8],
            [9, 34],
            [16, 987],
            [23, 28657],
        ];
    }

    public function testArrayObject(): void
    {
        $obj = new ArrayObject($expected = range(4,11, 2));
        $result = [];
        foreach ($obj as $key => $value) {
            $result[$key] = $value;
        }
        $this->assertEquals($expected, $result);
    }

    public function testLog(): void
    {
        $storage = [];
        $log = Functions::createLog($storage);
        $log->send('first');
        $log->send('second');
        $log->send('third');
        $this->assertEquals(['first', 'second', 'third'], $storage);
    }

}
