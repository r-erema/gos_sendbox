<?php

namespace learning\Patterns\DataMapper\Example1;

class StorageAdapter
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function find(int $id): ?array
    {
        return $this->data[$id] ?? null;
    }

}