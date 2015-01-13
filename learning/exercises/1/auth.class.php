<?php

class Auth {

	private static $_instance = null;
	private $_email;
	private $_login;
	private $_password;
	public $isAuthenticate = false;

	public static function getInstance() {
		if(self::$_instance === null) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function login($email, $login, $pass) {
		if(setcookie('login', $email . '|' . $login . '|' . $pass)) {
			$this->_email = $email;
			$this->_login = $login;
			$this->_password = $pass;
			$this->isAuthenticate = true;
		}
	}

	public function loginByCookie($cookie) {
		list($this->_email, $this->_login, $this->_pass) = explode('|', $cookie);
		$this->isAuthenticate = true;
	}

	public function logout() {
		if(setcookie('login', $this->_email . '|' . $this->_login . '|' . $this->_password, time() - 3600)) {
			$this->_email = null;
			$this->_login = null;
			$this->_password = null;
			$this->isAuthenticate = false;
		}
	}

	public function getLogin() {
		return $this->_login;
	}

	public function getEmail() {
		return $this->_email;
	}

}