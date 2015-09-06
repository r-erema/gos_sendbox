<?php

class Dealer {

    /**
     * @var Deck
     */
    private $deck;

    /**
     * Dealer constructor.
     * @param Deck $deck
     */
    public function __construct(Deck $deck) {
        $this->deck = $deck;
    }

    public function shuffleDeck() {
        $this->deck->shuffle();
    }

    public function dealCards() {

    }

    public function layAllCards() {
        $cards = $this->deck->getCards();
        $str = null;
        foreach ($cards as $card) {
            $str .= "<span style='color: {$card->getColor()}'>|{$card->getValue()} {$card->getHtmlEntity()}|</span>";
        }
        echo $str;
    }

    public function dealCard() {
        $card = $this->deck->dealCard();
        echo "<span style='color: {$card->getColor()}; margin-right: 8px;'>{$card->getValue()} {$card->getHtmlEntity()}</span>";
    }

    public function dealFlop() {
        for ($i = 0; $i < 3; $i++) {
            $this->dealCard();
        }
    }

    public function getDeckCount() {
        return $this->deck->currentDeckCount();
    }

}