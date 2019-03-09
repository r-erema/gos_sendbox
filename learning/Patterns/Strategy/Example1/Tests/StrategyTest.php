<?php

declare(strict_types=1);

namespace learning\Patterns\Strategy\Example1\Tests;

use learning\Patterns\Strategy\Example1\Context,
    learning\Patterns\Strategy\Example1\DateComparator,
    learning\Patterns\Strategy\Example1\IdComparator,
    PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{

    /**
     * @dataProvider provideIntegers
     *
     * @param array $collection
     * @param array $expected
     */
    public function testIdComparator(array $collection, array $expected): void
    {
        $obj = new Context(new IdComparator());
        $elements = $obj->executeStrategy($collection);
        $firstElement = array_shift($elements);
        $this->assertEquals($expected, $firstElement);
    }

    public static function provideIntegers(): array
    {
        return [
            [
                [['id' => 2], ['id' => 1], ['id' => 3]],
                ['id' => 1],
            ],
            [
                [['id' => 3], ['id' => 2], ['id' => 1]],
                ['id' => 1],
            ],
        ];
    }

    /**
     * @dataProvider provideDates
     *
     * @param array $collection
     * @param array $expected
     */
    public function testDateComparator(array $collection, array $expected): void
    {
        $obj = new Context(new DateComparator());
        $elements = $obj->executeStrategy($collection);
        $firstElement = array_shift($elements);
        $this->assertEquals($expected, $firstElement);
    }

    public static function provideDates(): array
    {
        return [
            [
                [['date' => '2014-03-03'], ['date' => '2015-03-02'], ['date' => '2013-03-01']],
                ['date' => '2013-03-01'],
            ],
            [
                [['date' => '2014-02-03'], ['date' => '2013-02-01'], ['date' => '2015-02-02']],
                ['date' => '2013-02-01'],
            ],
        ];
    }
}
