<?php

namespace woo\domain;

class Venue {

    private $id;
    private $name;

    /**
     * Venue constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

}