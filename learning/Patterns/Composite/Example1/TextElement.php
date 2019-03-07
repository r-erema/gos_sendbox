<?php

declare(strict_types=1);

namespace learning\Patterns\Composite\Example1;

class TextElement implements RenderableInterface
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return $this->text;
    }
}