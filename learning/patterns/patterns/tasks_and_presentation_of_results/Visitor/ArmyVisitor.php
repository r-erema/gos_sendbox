<?php

namespace Visitor;

abstract class ArmyVisitor {
    abstract function visit(Unit $node);

    public function visitArcher(Archer $node) {
        $this->visit($node);
    }

    public function visitCavalry(Cavalry $node) {
        $this->visit($node);
    }

    public function visitLaserCannonUnit(LaserCannonUnit $node) {
        $this->visit($node);
    }

    public function visitTroopCarrierUnit(TroopCarrierUnit $node) {
        $this->visit($node);
    }

    public function visitArmy(Army $node) {
        $this->visit($node);
    }

}