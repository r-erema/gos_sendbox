<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2\Tests;

use learning\Patterns\AbstractFactory\Example2\OReillyBookFactory,
    PHPUnit\Framework\TestCase,
    learning\Patterns\AbstractFactory\Example2\SamsBookFactory;

class AbstractFactoryTest extends TestCase
{

    public function testBookFactory(): void
    {
        $OReillyBookFactory = new OReillyBookFactory();

        $OReillyPhpBook1 = $OReillyBookFactory->makePhpBook();
        $this->assertEquals('Rasmus Lerdorf and Kevin Tatroe', $OReillyPhpBook1->getAuthor());

        $OReillyPhpBook2 = $OReillyBookFactory->makePhpBook();
        $this->assertEquals('PHP Cookbook', $OReillyPhpBook2->getTitle());

        $OReillyMysqlBook = $OReillyBookFactory->makeMysqlBook();
        $this->assertEquals('Managing and Using MySQL', $OReillyMysqlBook->getTitle());

        $samsBookFactory = new SamsBookFactory();
        $this->assertEquals('George Schlossnagle', $samsBookFactory->makePhpBook()->getAuthor());
        $this->assertEquals('MySQL, 3rd Edition', $samsBookFactory->makeMysqlBook()->getTitle());
    }

}