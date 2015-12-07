<?php

namespace learning\patterns\patterns\object_generation\classes;

class WellConnected extends Employee {
    function fire() {
        print "{$this->name}: позввони папику" . PHP_EOL;
    }
}