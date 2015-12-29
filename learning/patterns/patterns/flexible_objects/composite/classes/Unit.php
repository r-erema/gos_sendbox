<?php

abstract class Unit {
    /**
     * @return null
     */
    public function getComposite() {
        return null;
    }
    abstract public function bombardStrength();

    public function textDump($num = 0) {
        $txtOut = "";
        $pad = 4 * $num;
        $txtOut .= sprintf("%{$pad}s", "");
        $txtOut .= get_class($this) . ": ";
        $txtOut .= "Огневая мощь: {$this->bombardStrength()}" . PHP_EOL;
        return $txtOut;
    }
}