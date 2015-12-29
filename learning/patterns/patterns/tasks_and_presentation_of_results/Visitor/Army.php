<?php

namespace Visitor;

class Army extends CompositeUnit{
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