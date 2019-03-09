<?php

declare(strict_types=1);

namespace learning\Patterns\ChainOfResponsibilities\Example1;

use Psr\Http\Message\RequestInterface;

class SlowDatabaseHandler extends Handler
{
    protected function processing(RequestInterface $request): string
    {
        return 'Hello World!';
    }

}