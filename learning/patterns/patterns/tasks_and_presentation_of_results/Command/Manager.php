<?php

namespace Command;

class Manager {

    /**
     * @var String
     */
    private $error;

    public function login($login, $pass) {
        if (rand(0,1)) {
            return 'user_obj';
        } else {
            $this->error = 'Error';
            return null;
        }
    }

    /**
     * @return String
     */
    public function getError() {
        return $this->error;
    }

}