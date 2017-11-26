<?php

namespace learning\Patterns\DataMapper\Example1\Tests;

use learning\Patterns\DataMapper\Example1\StorageAdapter;
use learning\Patterns\DataMapper\Example1\User;
use learning\Patterns\DataMapper\Example1\UserMapper;
use PHPUnit\Framework\TestCase;

class DataMapperTest extends TestCase
{

    public function testCanMapUserFromStorage()
    {
        $storage = new StorageAdapter([
            1 => ['username' => 'fake_usr', 'email' => 'fake_usr@ma.il'],
            2 => ['username' => 'fake_usr2', 'email' => 'fake_usr2@ma.il']
        ]);
        $mapper = new UserMapper($storage);
        $user = $mapper->findById(1);
        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testWillNotMapInvalidData()
    {
        $storage = new StorageAdapter([]);
        $mapper = new UserMapper($storage);

        $mapper->findById(1);
    }
}
