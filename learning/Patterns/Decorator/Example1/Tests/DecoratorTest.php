<?php

namespace learning\Patterns\Decorator\Example1\Tests;

use learning\Patterns\Decorator\Example1\Book;
use learning\Patterns\Decorator\Example1\BookTitleDecorator;
use learning\Patterns\Decorator\Example1\BookTitleExclaimDecorator;
use learning\Patterns\Decorator\Example1\BookTitleStarDecorator;
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    public function testDecorator()
    {
        $book = new Book('Victor Hugo', 'The Man Who Laughs');
        $titleDecorator = new BookTitleDecorator($book);
        $exclaimDecorator = new BookTitleExclaimDecorator($titleDecorator);
        $starDecorator = new BookTitleStarDecorator($titleDecorator);

        $exclaimDecorator->exclaimTitle();
        $this->assertEquals('!The Man Who Laughs!', $titleDecorator->showTitle());

        $starDecorator->starTitle();
        $this->assertEquals('!The*Man*Who*Laughs!', $titleDecorator->showTitle());
    }
}
