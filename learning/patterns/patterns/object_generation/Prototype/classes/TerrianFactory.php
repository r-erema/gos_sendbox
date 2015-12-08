<?php

class TerrianFactory {

    /**
     * @var Sea
     */
    private $sea;

    /**
     * @var Forest
     */
    private $forest;

    /**
     * @var Plains
     */
    private $plains;

    /**
     * TerrianFactory constructor.
     * @param Sea $sea
     * @param Forest $forest
     * @param Plains $plains
     */
    public function __construct(Sea $sea, Forest $forest, Plains $plains) {
        $this->sea = $sea;
        $this->forest = $forest;
        $this->plains = $plains;
    }

    /**
     * @return Sea
     */
    public function getSea() {
        return clone $this->sea;
    }

    /**
     * @return Forest
     */
    public function getForest() {
        return clone $this->forest;
    }

    /**
     * @return Plains
     */
    public function getPlains() {
        return clone $this->plains;
    }

}