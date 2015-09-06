<?php

class Card {

    private $suit;
    private $value;
    private $htmlEntity;
    private $color;

    /**
     * Card constructor.
     * @param $suit
     * @param $value
     */
    public function __construct($suit, $value) {
        $this->suit = $suit;
        $this->value = $value;
        switch($this->suit) {
            case 'spades' :
                $this->htmlEntity = '&spades;';
                $this->color = '#363636';
                break;
            case 'hearts' :
                $this->htmlEntity = '&hearts;';
                $this->color = '#CD0000';
                break;
                break;
            case 'diamonds' :
                $this->htmlEntity = '&diams;';
                $this->color = '#00008B';
                break;
            case 'clubs' :
                $this->htmlEntity = '&clubs;';
                $this->color = '#32CD32';
                break;
        }
    }

    /**
     * @return mixed
     */
    public function getSuit() {
        return $this->suit;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getHtmlEntity() {
        return $this->htmlEntity;
    }

    /**
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

}