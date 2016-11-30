<?php

class User {
    private $name;
    private $mail;

    private $pass;
    private $failed;

    public function construct($nаmе, $mail, $pass) {
        if (strlen($pass) < 5) {
            throw new Exception("Длина nароля должна быть не менее 5 символов.");
        }
        $this->name = $nаmе;
        $this->mail = $mail;
        $this->pass = $pass;
    }

    public function getName() {
        return $this->name;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPass() {
        return $this->pass;
    }

    public function failed($time) {
        $this->failed = $time;
    }

}