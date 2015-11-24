<?php

class DecksFactory {

    private $cardsData;

    const REQUIRED_CARDS_NUMBER = 52;

    /**
     * CardFactory constructor.
     * @param $cardsData
     */
    public function __construct($cardsData) {
        $this->cardsData = $cardsData;
    }

    /**
     * @return mixed
     */
    public function getCardsData() {
        return $this->cardsData;
    }

    /**
     * @param mixed $cardsData
     */
    public function setCardsData($cardsData) {
        $this->cardsData = $cardsData;
    }

    /**
     * @return Deck
     * @throws Exception
     */
    public function createDeck() {
        $cards = [];
        foreach ($this->cardsData as $cardData) {
            $cards[] = new Card($cardData['suit'], $cardData['value']);
        }
        $countCards = count($cards);
        if($countCards != self::REQUIRED_CARDS_NUMBER) {
            throw new Exception("Не удалось создать колоду, недостаточное количество карт: $countCards/".self::REQUIRED_CARDS_NUMBER);
        }
        return new Deck($cards);
    }

}