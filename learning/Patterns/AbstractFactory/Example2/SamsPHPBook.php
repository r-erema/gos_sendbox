<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

class SamsPHPBook extends AbstractPhpBook
{

    private $author, $title;

    public function __construct()
    {
        $this->author = 'George Schlossnagle';
        $this->title = 'Advanced PHP Programming';
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}