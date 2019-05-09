<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1;

class Server extends Colleague
{
    public function process(): void
    {
        $data = $this->mediator->queryDb();
        $this->mediator->sendResponse(sprintf('Hello %s', $data));
    }
}
