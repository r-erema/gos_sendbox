<?php

namespace Strategy;

class MarkLogicMarker extends Marker{

    /**
     * @var MarkParse
     */
    private $engine;

    /**
     * MarkLogicMarker constructor.
     * @param $test
     */
    public function __construct($test) {
        parent::__construct($test);
        // $this->engine = new MarkParse($test);
    }

    public function mark($response) {
        return true;
    }

}