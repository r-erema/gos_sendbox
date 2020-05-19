<?php

declare(strict_types=1);

namespace learning\other\Generators\Example4;

use Iterator;

class FileIterator implements Iterator
{

    private $f;
    private ?string $data;
    private int $key = 0;

    public function __construct(string $filePath)
    {
        $this->f = fopen($filePath, 'rb');
    }
    public function __destruct()
    {
        fclose($this->f);
    }

    public function current(): ?string
    {
        return $this->data;
    }
    public function next(): void
    {
        $this->data = fgets($this->f) ?: null;
        $this->key++;
    }

    public function key()
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return null !== $this->data;
    }

    public function rewind(): void
    {
        fseek($this->f, 0);
        $this->data = fgets($this->f);
        $this->key = 0;
    }
}
