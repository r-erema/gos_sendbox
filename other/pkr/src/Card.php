<?php

namespace pkr;


class Card
{

    public const AVAILABLE_CARD_VALUE_DEUCE = '2';
    public const AVAILABLE_CARD_VALUE_TREE = '3';
    public const AVAILABLE_CARD_VALUE_FOUR = '4';
    public const AVAILABLE_CARD_VALUE_FIVE = '5';
    public const AVAILABLE_CARD_VALUE_SIX = '6';
    public const AVAILABLE_CARD_VALUE_SEVEN = '7';
    public const AVAILABLE_CARD_VALUE_EIGHT = '8';
    public const AVAILABLE_CARD_VALUE_NINE = '9';
    public const AVAILABLE_CARD_VALUE_TEN = '10';
    public const AVAILABLE_CARD_VALUE_JACK = 'J';
    public const AVAILABLE_CARD_VALUE_QUEEN = 'Q';
    public const AVAILABLE_CARD_VALUE_KING = 'K';
    public const AVAILABLE_CARD_VALUE_ACE = 'A';

    public const AVAILABLE_CARD_SUITE_CLUBS = '♣';
    public const AVAILABLE_CARD_SUITE_DIAMONDS = '♦';
    public const AVAILABLE_CARD_SUITE_HEARTS = '♥';
    public const AVAILABLE_CARD_SUITE_SPADES = '♠';

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $suite;

    /**
     * @param string $value
     * @param string $suite
     */
    public function __construct(string $value, string $suite)
    {
        $this->value = $value;
        $this->suite = $suite;
    }


}