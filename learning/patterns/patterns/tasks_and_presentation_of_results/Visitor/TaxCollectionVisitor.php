<?php

namespace Visitor;

class TaxCollectionVisitor extends ArmyVisitor{

    private $due = 0;
    private $report = "";

    /**
     * @param Unit $node
     */
    function visit(Unit $node) {
        $this->levy($node, 1);
    }

    /**
     * @param Archer $node
     */
    public function visitArcher(Archer $node) {
        $this->levy($node, 2);
    }

    /**
     * @param Cavalry $node
     */
    public function visitCavalry(Cavalry $node) {
        $this->levy($node, 3);
    }

    /**
     * @param TroopCarrierUnit $node
     */
    public function visitTroopCarrierUnit(TroopCarrierUnit $node) {
        $this->levy($node, 4);
    }

    /**
     * @param Unit $unit
     * @param $amount
     */
    private function levy(Unit $unit, $amount) {
        $this->report .= "Налог для " . get_class($unit);
        $this->report .= ": {$amount}" . PHP_EOL;
        $this->due += $amount;
    }

    /**
     * @return int
     */
    public function getDue() {
        return $this->due;
    }

    /**
     * @return string
     */
    public function getReport() {
        return $this->report;
    }


}