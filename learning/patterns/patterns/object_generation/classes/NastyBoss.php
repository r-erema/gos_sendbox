<?php

namespace learning\patterns\patterns\object_generation\classes;

class NastyBoss {

    /**
     * @var Employee[]
     */
    private $employees = [];

    public function addEmployee($employeeName) {
        $this->employees[] = new Minion($employeeName);
    }

    public function projectFails() {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }

}

