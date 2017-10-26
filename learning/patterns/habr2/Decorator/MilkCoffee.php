<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 26.10.17
 * Time: 13.41
 */

class MilkCoffee implements ICoffee {

    protected $coffee;

    /**
     * MilkCoffee constructor.
     * @param $coffee
     */
    public function __construct(ICoffee $coffee) {
        $this->coffee = $coffee;
    }

    /**
     * @return int
     */
    public function getCost() {
        return $this->coffee->getCost() + 2;
    }

    public function getDescription() {
        return "{$this->coffee->getDescription()}, milk";
    }


}