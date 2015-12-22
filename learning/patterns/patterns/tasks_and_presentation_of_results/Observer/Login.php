<?php

namespace Observer;

class Login implements Observable {

    /**
     * @var Observer[]
     */
    private $observers = array();
    private $storage;
    private $status = array();

    const LOGIN_USER_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 3;

    /**
     * Login constructor.
     */
    public function __construct() {
        $this->observers = [];
    }

    /**
     * @param Observer $observer
     */
    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    /**
     * @param Observer $observer
     */
    public function detach(Observer $observer) {
        $this->observers = array_filter($this->observers, function ($a) use ($observer) {
            return (!($a === $observer));
        });
    }

    /**
     * @return array
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param $status
     * @param $user
     * @param $ip
     */
    public function setStatus($status, $user, $ip) {
        $this->status = array($status, $user, $ip);
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
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
        switch (rand(1,3)) {
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
        }
        $this->notify();
        return $isValid;
    }

}