<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1;

class Mediator implements MediatorInterface
{
    private $server;
    private $database;
    private $client;

    public function __construct(Server $server, Database $database, Client $client)
    {
        $this->server = $server;
        $this->database = $database;
        $this->client = $client;
        $this->database->setMediator($this);
        $this->server->setMediator($this);
        $this->client->setMediator($this);
    }
    public function sendResponse(string $content):void
    {
        $this->client->output($content);
    }
    public function makeRequest(): void
    {
        $this->server->process();
    }
    public function queryDb(): string
    {
        return $this->database->getData();
    }
}
