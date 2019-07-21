<?php

declare(strict_types=1);

namespace learning\Doctrine\PersistentCollection\Example1\Entities;

use Doctrine\Common\Collections\Collection;

class Book
{

    private string $id;

    private string $title;

    /** @var Collection */
    private Collection $authors;

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function removeAuthor(Author $author): void
    {
        if (!$this->authors->contains($author)) {
            return;
        }
        $this->authors->removeElement($author);
        $author->removeBook($this);
    }

    public function setAuthors(Collection $authors): self
    {
        $this->authors = $authors;
        return $this;
    }

}