<?php

namespace Command;

class MessageSystem {
    private $error;
    public function send($email, $msg, $topic) {
        return rand(0,1);
    }

    /**
     * @return mixed
     */
    public function getError() {
        return $this->error;
    }

}