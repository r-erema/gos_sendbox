<?php

var_dump(json_encode([
    '1st elem',
    '2nd elem',
    '3rd elem',
    '4th elem',
], JSON_FORCE_OBJECT | JSON_PRETTY_PRINT));

class User implements JsonSerializable {

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $secondName;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @return array
     */
    function jsonSerialize() {
        return [
            'name' => "{$this->firstName} {$this->secondName}",
            'email_hash' => md5($this->email)
        ];
    }
}

$user = new User();
$user->firstName = 'John';
$user->secondName = 'Doe';
$user->email = 'JohnDoe@mail.test';
$user->password = '123';

$encoded = json_encode($user);

var_dump(json_decode($encoded, true));