<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 3/29/18
 * Time: 9:09 PM
 */

namespace pkr;


class Deck
{

    /**
     * @var array
     */
    private $cards = [];

    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @param array $cards
     */
    public function setCards(array $cards): void
    {
        $this->cards = $cards;
    }
}