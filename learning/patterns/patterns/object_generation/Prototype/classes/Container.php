<?php

class Container {

    /**
     * @var Contained
     */
    public $contained;

    /**
     * Container constructor.
     */
    public function __construct() {
        $this->contained = new Contained();
    }

    public function __clone() {
        $this->contained = clone $this->contained;
    }

}