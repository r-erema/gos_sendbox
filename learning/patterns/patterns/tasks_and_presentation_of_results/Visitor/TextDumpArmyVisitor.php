<?php

namespace Visitor;

class TextDumpArmyVisitor extends ArmyVisitor{

    /**
     * @var string
     */
    private $text = "";

    /**
     * @param Unit $node
     */
    public function visit(Unit $node) {
        $txt = "";
        $pad = 4 * $node->getDepth();
        $txt .= sprintf("%{$pad}s", "");
        $txt .= get_class($node) . ": ";
        $txt .= "Огневая мощь: " . $node->bombardStrength() . PHP_EOL;
        $this->text .= $txt;
    }

    /**
     * @return string
     */
    public function getText() {
        return $this->text;
    }

}