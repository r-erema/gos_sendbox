<?php

namespace Visitor;

abstract class Unit {

    /**
     * @var int
     */
    protected $depth = 0;

    /**
     * @param ArmyVisitor $visitor
     */
    public function accept(ArmyVisitor $visitor) {
        $methodArr = explode('\\', get_class($this));
        $methodName = array_slice($methodArr, -1, 1)[0];
        $method = "visit{$methodName}";
        $visitor->$method($this);
    }

    /**
     * @return int
     */
    public function getDepth() {
        return $this->depth;
    }

    /**
     * @param int $depth
     */
    public function setDepth($depth) {
        $this->depth = $depth;
    }

    abstract public function bombardStrength();

}