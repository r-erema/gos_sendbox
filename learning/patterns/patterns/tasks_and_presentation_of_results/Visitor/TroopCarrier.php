<?php

namespace Visitor;

class TroopCarrier extends CompositeUnit {

    public function addUnit(Unit $unit) {
        if ($unit instanceof Cavalry) {
            throw new Exception('Нельзя помещать лошадь на бронетранспортер');
        }
        parent::addUnit($unit);
    }

    public function bombardStrength() {
        return 0;
    }
}