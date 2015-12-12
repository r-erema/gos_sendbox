<?php

namespace Strategy;

abstract class Marker {

    protected $test;

    /**
     * Marker constructor.
     * @param $test
     */
    public function __construct($test) {
        $this->test = $test;
    }

    abstract public function mark($response);
}