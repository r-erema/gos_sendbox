<?php

namespace learning\Patterns\State\Example1;

class BookTitleStateStarts implements BookTitleStateInterface
{

    private $titleCount = 0;

    public function showTitle(BookContext $context): string
    {
        $title = $context->getBook()->getTitle();
        $this->titleCount++;
        if (1 < $this->titleCount) {
            $context->setTitleState(new BookTitleStateExclaim());
        }
        return str_replace(' ', '*', $title);
    }
}