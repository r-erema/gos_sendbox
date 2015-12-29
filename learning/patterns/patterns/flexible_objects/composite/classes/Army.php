<?php

class Army extends CompositeUnit {

    /**
     * @var Unit[]
     */
    private $units = [];

    /**
     * @param Unit $unit
     */
    public function addUnit(Unit $unit) {
        if (in_array($unit, $this->units, true)) {
            return;
        }
        $this->units[] = $unit;
    }

    public function removeUnit(Unit $unit) {
        $this->units = array_udiff($this->units, [$unit], function ($a, $b) {
            return $a === $b ? 0 : 1;
        });
    }

    /**
     * @return int
     */
    public function bombardStrength() {
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }

}