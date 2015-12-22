<?php

namespace Observer;

abstract class LoginObserver implements Observer {

    /**
     * @var Login
     */
    private $login;

    /**
     * LoginObserver constructor.
     * @param Login $login
     */
    public function __construct(Login $login) {
        $this->login = $login;
        $login->attach($this);
    }


    /**
     * @param Observable $observable
     */
    public function update(Observable $observable) {
        if ($observable === $this->login) {
            $this->doUpdate($observable);
        }
    }

    /**
     * @param Login $login
     * @return mixed
     */
    abstract function doUpdate(Login $login);
}