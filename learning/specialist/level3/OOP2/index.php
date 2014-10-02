<meta charset="utf-8">
<?php
class Human {
	const HANDS = 2;

	public function printHands() {
		echo self::HANDS;
	}
}

$chel = new Human();
$chel->printHands();
echo Human::HANDS;
echo '<hr>';

abstract class AUser {
	abstract function showInfo();
}

class User extends AUser {
	public  static $countObjects = 0;
	public function __construct() {
		++self::$countObjects;
	}
	public function __clone() {
		++self::$countObjects;
	}
	public function showInfo(){}
}

interface ISuperUser {
	public function getInfo();
}

class SuperUser extends User implements ISuperUser {
	public $login;
	public $password;
	public $role;
	public  static $countObjects = 0;
	public function __construct($login, $password, $role) {
		++self::$countObjects;
		$this->login = $login;
		$this->password = $password;
		$this->role = $role;
	}

	public function __clone() {
		++self::$countObjects;
	}

	public function getInfo(){
		return (array)$this;
	}
}

$su = new SuperUser('Supa', '123', 'admin');
$su = new SuperUser('Supa', '123', 'admin');
$su = new SuperUser('Supa', '123', 'admin');
$su = new SuperUser('Supa', '123', 'admin');
$su = clone $su;
$su = new User();
$su = new User();
$su = new User();
$su = new User();
$su = new User();
$su = clone $su;
echo 'Всего обычных пользователей: '.User::$countObjects;
echo '<br>';
echo 'Всего супер-пользователей: '.SuperUser::$countObjects;