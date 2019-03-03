<?php

namespace pkr;

class Dealer
{

    /**
     * @var Deck
     */
    private $deck;

    /**
     * @var array
     */
    private $burnedCards = [];

    /**
     * @var int
     */
    private $players;

    public function __construct(Deck $deck, array $players)
    {
        $this->deck = $deck;
        $this->players = $players;
    }

    public function washDeck(): void
    {
        $cards = $this->getDeckCards();
        for ($i = 0, $washesCount = rand(2, 4); $i < $washesCount; $i++) {
            shuffle($cards);
        }
        $this->deck->setCards($cards);
    }

    public function shuffleDeck(): void
    {
        $cards = $this->getDeckCards();
        for ($i = 0; $i < 2; $i++) {
            $cards = $this->getDeckCards();
            shuffle($cards);
            $this->deck->setCards($cards);
        }
        $this->deck->setCards($cards);

        //todo: Сделать как в жизни: 2 шафла, три срезки, 1 шафл, 1 срезка
    }

    /**
     * @return array
     */
    private function getDeckCards(): array
    {
        return $this->deck->getCards();
    }

    public function burnCard(): void
    {
        $this->burnedCards[] = array_shift($this->deck->getCards());
    }

    public function dealCardsToPlayers()
    {
        $cards = $this->getDeckCards();
        foreach ($this->players as $player) {/** @var Player $player */
            $player->addCard(array_shift($cards));
        }

        foreach ($this->players as $player) {/** @var Player $player */
            $player->addCard(array_shift($cards));
        }
        $this->deck->setCards($cards);
    }

    public function getPlayers()
    {
        return $this->players;
    }

}