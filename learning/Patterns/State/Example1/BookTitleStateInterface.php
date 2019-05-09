<?php

namespace learning\Patterns\State\Example1;

interface BookTitleStateInterface
{
    public function showTitle(BookContext $context): string;
}
