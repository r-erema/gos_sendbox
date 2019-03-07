<?php

namespace learning\Patterns\DataMapper\Example1;

class UserMapper
{
   private $adapter;
   public function __construct(StorageAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param int $id
     * @return User
     * @throws \RuntimeException
     */
    public function findById(int $id): User
    {
        $result = $this->adapter->find($id);
        if ($result === null) {
            throw new \RuntimeException("User #{$id} not found");
        }
        return $this->mapRowToUser($result);
    }
    private function mapRowToUser(array $row): User
    {
        return User::fromState($row);
    }
}