<?php

namespace learning\patterns\patterns\object_generation\classes;

class Minion extends Employee{
    function fire() {
        print "{$this->name}: убери с стола" . PHP_EOL;
    }
}