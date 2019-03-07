<?php
declare(strict_types=1);

namespace learning\Patterns\Adapter\Tests;

use learning\Patterns\Adapter\Example1\Book,
    learning\Patterns\Adapter\Example1\EBookAdapter,
    learning\Patterns\Adapter\Example1\Kindle,
    PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{

    public function testCanTurnPageOnBook(): void
    {
        $book = new Book();
        $book->open();
        $book->turnPage();

        $this->assertEquals(2, $book->getPage());
    }

    public function testCanTurnPageOnKindleLikeInANormalBook(): void
    {
        $kindle = new Kindle();
        $book = new EBookAdapter($kindle);
        $book->open();
        $book->turnPage();

        $this->assertEquals(2, $book->getPage());
    }

}