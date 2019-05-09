<?php

namespace learning\Patterns\State\Example1;

class BookContext
{
    /** @var Book */
    private $book;
    /** @var BookTitleStateInterface */
    private $bookTitleState;

    public function __construct(Book $book)
    {
        $this->book = $book;
        $this->setTitleState(new BookTitleStateStarts());
    }

    public function setTitleState(BookTitleStateInterface $titleState): void
    {
        $this->bookTitleState = $titleState;
    }

    public function getBookTitle(): string
    {
        return $this->bookTitleState->showTitle($this);
    }

    public function getBook(): Book
    {
        return $this->book;
    }
}
