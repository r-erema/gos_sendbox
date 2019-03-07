<?php

declare(strict_types=1);

namespace learning\Patterns\Adapter\Example1;

class Book implements BookInterface
{

    private $page;

    public function turnPage(): void
    {
        $this->page++;
    }
    public function open(): void
    {
        $this->page = 1;
    }
    public function getPage(): int
    {
        return $this->page;
    }
}