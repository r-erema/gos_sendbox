<?php

declare(strict_types=1);

namespace learning\Patterns\Command\Example1;

class HelloCommand implements CommandInterface
{
    private $output;

    public function __construct(Receiver $output)
    {
        $this->output = $output;
    }

    public function execute(): void
    {
        $this->output->write('Hello World');
    }

}