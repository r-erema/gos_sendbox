<?php

namespace learning\patterns\patterns\object_generation\FactoryMethod\classes\wrong;

class CommsManager {

    const BLOGGS = 1;
    const MEGA = 2;
    private $mode =1;

    /**
     * CommsManager constructor.
     * @param int $mode
     */
    public function __construct($mode) {
        $this->mode = $mode;
    }

    public function getHeaderText() {
        switch($this->mode) {
            case self::MEGA: return "MegaCal верхний колонтитул" . PHP_EOL;
            default: return "BloggsCal верхний колонтитул" . PHP_EOL;
        }
    }

    public function getApptEncoder() {
        switch ($this->mode) {
            case self::MEGA:
                return new \MegaApptEncoder();
            default: return new \BloggsApptEncoder();
        }
    }
}