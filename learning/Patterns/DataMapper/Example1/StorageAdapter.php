<?php

namespace learning\Patterns\DataMapper\Example1;

class StorageAdapter
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * StorageAdapter constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function find(int $id)
    {
        return $this->data[$id] ?? null;
    }

}