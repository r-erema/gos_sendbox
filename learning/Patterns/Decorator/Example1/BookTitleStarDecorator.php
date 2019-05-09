<?php

namespace learning\Patterns\Decorator\Example1;

class BookTitleStarDecorator extends BookTitleDecorator
{

    /**
     * @var BookTitleDecorator
     */
    private $bookTitleDecorator;

    /**
     * @param BookTitleDecorator $bookTitleDecorator
     */
    public function __construct(BookTitleDecorator $bookTitleDecorator)
    {
        $this->bookTitleDecorator = $bookTitleDecorator;
    }

    public function starTitle(): void
    {
        $this->bookTitleDecorator->title = str_replace(' ', '*', $this->bookTitleDecorator->title);
    }
}
