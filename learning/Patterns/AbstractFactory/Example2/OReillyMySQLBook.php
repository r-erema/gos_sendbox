<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

class OReillyMySQLBook extends AbstractMysqlBook
{

    private $author, $title;

    public function __construct()
    {
        $this->author = 'George Reese, Randy Jay Yarger, and Tim King';
        $this->title = 'Managing and Using MySQL';
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