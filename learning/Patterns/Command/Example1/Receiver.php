<?php

declare(strict_types=1);

namespace learning\Patterns\Command\Example1;

class Receiver
{

    private $enableDate = false, $output = [];

    public function write(string $string): void
    {
        if ($this->enableDate) {
            $string .= ' [' . date('Y-m-d H:i:s') . ']';
        }
        $this->output[] = $string;
    }

    public function getOutput(): string
    {
        return implode(PHP_EOL, $this->output);
    }

    public function enableDate(): void
    {
        $this->enableDate = true;
    }

    public function disableDate(): void
    {
        $this->enableDate = false;
    }

}