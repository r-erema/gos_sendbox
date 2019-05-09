<?php
declare(strict_types=1);

namespace learning\Patterns\Adapter\Tests;

use learning\Patterns\Adapter\Example1\Book;
use learning\Patterns\Adapter\Example1\EBookAdapter;
use learning\Patterns\Adapter\Example1\Kindle;
use PHPUnit\Framework\TestCase;

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
