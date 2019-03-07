<?php

declare(strict_types=1);

namespace learning\Patterns\Adapter\Example1;

class EBookAdapter implements BookInterface
{

    protected $eBook;

    public function __construct(EBookInterface $eBook)
    {
        $this->eBook = $eBook;
    }

    public function turnPage(): void
    {
        $this->eBook->pressNext();
    }

    public function open(): void
    {
        $this->eBook->unlock();
    }

    public function getPage(): int
    {
        $pages = $this->eBook->getPage();
        return $pages[array_key_first($pages)];
    }


}