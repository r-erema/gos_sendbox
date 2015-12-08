<?php

abstract class TileDecorator extends Tile {
    /**
     * @var Tile
     */
    protected $tile;

    /**
     * TileDecorator constructor.
     * @param Tile $tile
     */
    public function __construct(Tile $tile) {
        $this->tile = $tile;
    }

}