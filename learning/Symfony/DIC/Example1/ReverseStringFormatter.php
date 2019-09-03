<?php

declare(strict_types=1);

namespace learning\Symfony\DIC\Example1;

class ReverseStringFormatter
{

    public function format(string $input): string
    {
        return strrev($input);
    }

}