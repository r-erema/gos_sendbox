<?php

namespace Observer\bySPL;

use SplObserver;

class Login implements \SplSubject {

    const LOGIN_USER_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 3;

    /**
     * @var \SplObjectStorage
     */
    private $storage;

    /**
     * Login constructor.
     */
    public function __construct() {
        $this->storage = new \SplObjectStorage();
    }

    /**
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer) {
        $this->storage->attach($observer);
    }

    /**
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer) {
        $this->storage->detach($observer);
    }

    public function notify() {
        foreach ($this->storage as $obs) {
            $obs->update($this);
        }
    }

    /**
     * @param $user
     * @param $pass
     * @param $ip
     * @return bool
     */
    public function handleLogin($user, $pass, $ip) {
        $isValid = false;
/*        switch (rand(1,3)) {
            case 1:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isValid = true;
                break;
            case 2:
                $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isValid = false;
                break;
            case 3:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isValid = false;
                break;
        }*/
        $this->notify();
        return $isValid;
    }

}