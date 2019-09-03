<?php

declare(strict_types=1);

namespace learning\Symfony\DIC\Example1;

class StringService
{

    private ReverseStringFormatter $reverseStringFormatter;
    private UpperCaseFormatter $upperCaseFormatter;

    public function __construct(ReverseStringFormatter $reverseStringFormatter, UpperCaseFormatter $upperCaseFormatter)
    {
        $this->reverseStringFormatter = $reverseStringFormatter;
        $this->upperCaseFormatter = $upperCaseFormatter;
    }

    public function reverseAndFormatUpperCase(string $string): string
    {
        $string = $this->reverseStringFormatter->format($string);
        $string = $this->upperCaseFormatter->format($string);
        return $string;
    }

}