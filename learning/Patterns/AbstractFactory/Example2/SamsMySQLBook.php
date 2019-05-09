<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

class SamsMySQLBook extends AbstractMysqlBook
{
    private $author;
    private $title;

    public function __construct()
    {
        $this->author = 'Paul Dubois';
        $this->title = 'MySQL, 3rd Edition';
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
