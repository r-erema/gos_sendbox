<?php

declare(strict_types=1);

namespace learning\Patterns\Command\Example1;

interface CommandInterface
{
    public function execute(): void;
}
