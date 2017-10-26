<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 26.10.17
 * Time: 13.40
 */

class SimpleCoffee implements ICoffee {

    public function getCost() {
        return 10;
    }

    public function getDescription() {
        return 'Simple coffee';
    }


}