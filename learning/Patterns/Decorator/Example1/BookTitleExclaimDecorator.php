<?php

namespace learning\Patterns\Decorator\Example1;

class BookTitleExclaimDecorator extends BookTitleDecorator
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

    public function exclaimTitle(): void
    {
        $this->bookTitleDecorator->title = "!{$this->bookTitleDecorator->title}!";
    }

}