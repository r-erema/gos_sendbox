<?php
namespace learning\Patterns\State\Example1\Tests;

use learning\Patterns\State\Example1\Book;
use learning\Patterns\State\Example1\BookContext;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{

    /**
     * @test
     */
    public function StateTest()
    {
        $book = new Book('PHP for cats', 'Larry Truet');
        $context = new BookContext($book);

        $this->assertEquals($context->getBookTitle(), 'PHP*for*cats');
        $this->assertEquals($context->getBookTitle(), 'PHP*for*cats');
        $this->assertEquals($context->getBookTitle(), 'PHP!for!cats');
        $this->assertEquals($context->getBookTitle(), 'PHP!for!cats');
        $this->assertEquals($context->getBookTitle(), 'PHP*for*cats');
        $this->assertEquals($context->getBookTitle(), 'PHP*for*cats');
    }
}
