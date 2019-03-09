<?php

declare(strict_types=1);

namespace learning\Patterns\Mediator\Example1;

interface MediatorInterface
{
    public function sendResponse(string $content): void;
    public function makeRequest(): void;
    public function queryDb(): string;
}