<?php

declare(strict_types=1);

namespace learning\Patterns\Composite\Example1;

class Form implements RenderableInterface
{
    /** @var RenderableInterface[] */
    private $elements;

    public function render(): string
    {
        $formCode = '<form>';
        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }
        $formCode .= '</form>';
        return $formCode;
    }

    public function addElement(RenderableInterface $element): void
    {
        $this->elements[] = $element;
    }
}