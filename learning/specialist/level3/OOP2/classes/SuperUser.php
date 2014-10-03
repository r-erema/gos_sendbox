<?php

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