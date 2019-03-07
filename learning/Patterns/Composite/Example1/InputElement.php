<?php

declare(strict_types=1);

namespace learning\Patterns\Composite\Example1;

class InputElement implements RenderableInterface
{
    public function render(): string
    {
        return '<input type="text" />';
    }
}