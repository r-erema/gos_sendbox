<?php

abstract class CompositeUnit extends Unit {

    private $units = [];

    /**
     * @return self
     */
    public function getComposite() {
        return $this;
    }

    protected function units() {
        return $this->units;
    }

    public function removeUnit(Unit $unit) {
        $this->units = array_udiff($this->units, [$unit], function ($a, $b) {
            return ($a === $b) ? 0 : 1;
        });
    }

    public function addUnit(Unit $unit) {
        if (in_array($unit, $this->units, true)) {
            return;
        }
        $this->units[] = $unit;
    }

}