<?php

namespace learning\Patterns\Decorator\Example1;

class Book
{

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    /**
     * @param string $author
     * @param string $title
     */
    public function __construct(string $author, string $title)
    {
        $this->author = $author;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthorAndTitle()
    {
        return "{$this->title} by {$this->author}";
    }

}