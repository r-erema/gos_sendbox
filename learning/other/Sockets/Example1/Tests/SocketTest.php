<?php

declare(strict_types=1);

namespace learning\other\Sockets\Example1\Tests;

use PHPUnit\Framework\TestCase;

class SocketTest extends TestCase
{
    private $socketServer;
    private $socketClient;

    public function setUp(): void
    {
        $this->socketServer = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $this->socketClient = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    }

    public function testSocket(): void
    {
        socket_bind($this->socketServer, '127.0.0.1', 8888);
        socket_listen($this->socketServer, 2);

        socket_connect($this->socketClient, '127.0.0.1', 8888);

        $acceptedSocketServer = socket_accept($this->socketServer);
        $message = 'Test message';
        socket_write($acceptedSocketServer, $message, strlen($message));

        self::assertEquals($message, socket_read($this->socketClient, 2048));
    }

    public function tearDown(): void
    {
        socket_close($this->socketServer);
        socket_close($this->socketClient);
    }
}
