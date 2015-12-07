<?php

namespace learning\patterns\patterns\object_generation\classes\createObjectInObject;
use learning\patterns\patterns\object_generation\classes as common;



class NastyBoss {

    /**
     * @var Employee[]
     */
    private $employees = [];

    public function addEmployee($employeeName) {
        $this->employees[] = new common\Minion($employeeName);
    }

    public function projectFails() {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }

}

