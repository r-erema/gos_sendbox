<?php

declare(strict_types=1);

namespace learning\Doctrine\PersistentCollection\Example1\Entities;

use Doctrine\Common\Collections\Collection;

class Author
{
    private string $id;

    private string $name;

    /** @var Collection */
    private Collection $books;

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function removeBook(Book $book): void
    {
        if (!$this->books->contains($book)) {
            return;
        }
        $this->books->removeElement($book);
        $book->removeAuthor($this);
    }

}