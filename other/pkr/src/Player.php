<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 3/29/18
 * Time: 10:08 PM
 */

namespace pkr;


class Player
{

    /**
     * @var array
     */
    private $cards;


    /**
     * @var string
     */
    private $playerName;

    public function __construct(string $name)
    {
        $this->playerName = $name;
    }

    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

}