<?php

declare(strict_types=1);

namespace learning\Patterns\Adapter\Example1;

class Kindle implements EBookInterface
{
    private $page = 1;

    private $totalPages = 100;

    public function unlock(): void
    {
    }

    public function pressNext(): void
    {
        $this->page++;
    }
    public function getPage(): array
    {
        return [$this->page, $this->totalPages];
    }
}
