<?php

namespace Visitor;

abstract class CompositeUnit extends Unit{

    /**
     * @var Unit[]
     */
    protected $units = [];

    /**
     * @param Unit $unit
     */
    public function addUnit(Unit $unit) {
        foreach ($this->units as $thisUnit) {
            if ($unit === $thisUnit) {
                return;
            }
        }
        $unit->setDepth($this->depth++);
        $this->units[] = $unit;
    }

    public function accept(ArmyVisitor $visitor) {
        parent::accept($visitor);
        foreach ($this->units as $unit) {
            $unit->accept($visitor);
        }
    }
}