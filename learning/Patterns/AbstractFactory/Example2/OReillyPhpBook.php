<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

class OReillyPhpBook extends AbstractPhpBook
{
    private $author;
    private $title;

    private static $oddOrEven = 'odd';

    public function __construct()
    {
        if ('odd' === self::$oddOrEven) {
            $this->author = 'Rasmus Lerdorf and Kevin Tatroe';
            $this->title = 'Programming PHP';
            self::$oddOrEven = 'even';
        } else {
            $this->author = 'David Sklar and Adam Trachtenberg';
            $this->title = 'PHP Cookbook';
            self::$oddOrEven = 'odd';
        }
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
