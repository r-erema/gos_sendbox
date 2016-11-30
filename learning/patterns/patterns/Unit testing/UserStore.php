<?php

require_once __DIR__ . '/User.php';
class UserStore {

    const MIN_PASS_SYMBOLS_COUNT = 5;

    /**
     * @var array
     */
    private $users = [];

    /**
     * @param $name
     * @param $email
     * @param $pass
     * @return bool
     * @throws Exception
     */
    public function addUser($name, $email, $pass) {
        if (isset($this->users[$email])) {
            throw new Exception("User with e-mail: {$email} is already registered");
        }

        if (strlen($pass) < self::MIN_PASS_SYMBOLS_COUNT) {
            throw new Exception('Pass length should be ' . self::MIN_PASS_SYMBOLS_COUNT . ' symbols length');
        }

        $this->users[$email] = new User($name, $email, $pass);
        return true;
    }

    /**
     * @param $email
     */
    public function notifyPasswordFailure($email) {
        if (isset($this->users[$email])) {
            $this->users[$email]->failed(time());
        }
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUser($email) {
        if (isset($this->users[$email])) {
            return $this->users[$email];
        }
        return null;
    }

}