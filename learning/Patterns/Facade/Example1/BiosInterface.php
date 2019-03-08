<?php

declare(strict_types=1);

namespace learning\Patterns\Facade\Example1;

interface BiosInterface
{

    public function execute(): void;

    public function waitForKeyPress(): void;

    public function launch(OsInterface $os): void;

    public function powerDown(): void;

}