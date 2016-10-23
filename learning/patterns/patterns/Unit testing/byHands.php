<?php
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

        $this->users[$email] = ['pass' => $pass, 'e-mail' => $email, 'name' => $name];
        return true;
    }

    /**
     * @param $email
     */
    public function notifyPasswordFailure($email) {
        if (isset($this->users[$email])) {
            $this->users[$email]['failed'] = time();
        }
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUser($email) {
        return $this->users[$email];
    }

}

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


$store = new UserStore();
$store->addUser('Bob Williams', 'bob@example.com', '12345');

$validator = new Validator($store);
if ($validator->validateUser('bob@example.com', '123452')) {
    echo 'Hi!!!' . PHP_EOL;
}
var_dump($store->getUser('bob@example.com'));

