<?php

declare(strict_types=1);

namespace learning\Patterns\ChainOfResponsibilities\Example1;

use Psr\Http\Message\RequestInterface;

abstract class Handler
{

    private $successor;

    public function __construct(Handler $handler = null)
    {
        $this->successor = $handler;
    }

    final public function handle(RequestInterface $request)
    {
        $processed = $this->processing($request);
        if (($processed === null) && $this->successor !== null) {
            $processed = $this->successor->handle($request);
        }
        return $processed;
    }

    abstract protected function processing(RequestInterface $request);
}