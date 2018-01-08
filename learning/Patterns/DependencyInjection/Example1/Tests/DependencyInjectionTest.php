<?php

namespace learning\Patterns\DependencyInjection\Example1\Tests;

use learning\Patterns\DependencyInjection\Example1\DatabaseConfiguration;
use learning\Patterns\DependencyInjection\Example1\DatabaseConnection;
use PHPUnit\Framework\TestCase;

class DependencyInjectionTest extends TestCase
{

    public function testDependencyInjection()
    {
        $config = new DatabaseConfiguration('localhost', 3306, 'root', '123');
        $connection = new DatabaseConnection($config);
        $this->assertEquals('root:123@localhost:3306', $connection->getDsn());
    }

}
