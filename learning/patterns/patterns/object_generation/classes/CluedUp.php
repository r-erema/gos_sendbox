<?php

namespace learning\patterns\patterns\object_generation\classes;

class CluedUp extends Employee {
    public function fire() {
            print "{$this->name}: вызови адвоката" . PHP_EOL;
    }
}