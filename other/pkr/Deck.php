<?php

class Deck {

    /**
     * @var Card[]
     */
    private $cards = [];
    private $dealtCards = [];

    /**
     * Deck constructor.
     * @param Card[] $cards
     */
    public function __construct(array $cards) {
        $this->cards = $cards;
    }

    public function getCards() {
        return $this->cards;
    }

    public function shuffle() {
        shuffle($this->cards);
    }

    /**
     * @return Card
     */
    public function dealCard() {
        $card = array_shift($this->cards);
        $this->dealtCards[] = $card;
        return $card;
    }

    public function currentDeckCount() {
        return count($this->cards);
    }

}