<?php

namespace learning\Patterns\Decorator\Example1;

class BookTitleDecorator
{

    /**
     * @var Book
     */
    protected $book;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
        $this->resetTitle();
    }

    private function resetTitle(): void
    {
        $this->title = $this->book->getTitle();
    }

    /**
     * @return string
     */
    public function showTitle(): string
    {
        return $this->title;
    }
}
