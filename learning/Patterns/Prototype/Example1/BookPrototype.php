<?php

declare(strict_types=1);

namespace learning\Patterns\Prototype\Example1;

abstract class BookPrototype
{
    protected $title;
    protected $category;

    abstract public function __clone();

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}
