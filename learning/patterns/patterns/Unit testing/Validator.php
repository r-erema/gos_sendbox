<?php

class Validator {

    /** @var UserStore */
    private $store;

    /**
     * Validator constructor.
     * @param UserStore $store
     */
    public function __construct(UserStore $store) {
        $this->store = $store;
    }

    /**
     * @param $email
     * @param $pass
     * @return bool
     */
    public function validateUser($email, $pass) {
        if (!is_array($user = $this->store->getUser($email))) {
            return false;
        }
        if ($user['pass'] === $pass) {
            return true;
        }
        $this->store->notifyPasswordFailure($email);
        return false;
    }

}