<?php

declare(strict_types=1);

namespace learning\Patterns\FluentInterface\Example1\Tests2;

use learning\Patterns\FluentInterface\Example1\Sql;
use PHPUnit\Framework\TestCase;

class FluentInterfaceTest extends TestCase
{

    public function testBuildSQL(): void
    {
        $query = (new Sql())
            ->select(['foo', 'bar'])
            ->from('foobar', 'f')
            ->where('f.bar = ?');

        $this->assertEquals('SELECT foo, bar FROM foobar AS f WHERE f.bar = ?', (string) $query);
    }

}
