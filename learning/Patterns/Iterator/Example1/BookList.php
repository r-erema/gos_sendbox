<?php

declare(strict_types=1);

namespace learning\Patterns\Iterator\Example1;

class BookList implements \Countable, \Iterator
{
    /**
     * @var Book[]
     */
    private $books = [];

    private $currentIndex = 0;

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $bookToRemove): void
    {
        foreach ($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() === $bookToRemove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }
        $this->books = array_values($this->books);
    }

    public function current(): Book
    {
        return $this->books[$this->currentIndex];
    }

    public function next(): void
    {
        $this->currentIndex++;
    }

    public function key(): int
    {
        return $this->currentIndex;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->currentIndex]);
    }

    public function rewind(): void
    {
        $this->currentIndex = 0;
    }

    public function count(): int
    {
        return count($this->books);
    }
}
