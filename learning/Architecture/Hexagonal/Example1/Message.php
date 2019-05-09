<?php
namespace learning\Architecture\Hexagonal\Example1;

class Message implements MessageInterface
{
    private $to;
    private $body;

    public function __construct(string $to, string $body)
    {
        $this->to = $to;
        $this->body = $body;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
