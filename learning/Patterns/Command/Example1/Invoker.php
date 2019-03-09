<?php

declare(strict_types=1);

namespace learning\Patterns\Command\Example1;

class Invoker
{

    private $command;

    public function setCommand(CommandInterface $command): void
    {
        $this->command = $command;
    }

    public function run(): void
    {
        $this->command->execute();
    }

}