<?php
session_start();
if (!isset($_SESSION['count'])) {
	$_SESSION['count'] = 0;
} else {
	$_SESSION['count']++;
}
class cookieAndSessionManagment {

	private $_action;

	public function __construct($action) {
		$this->_action = $action;
	}

	public function executeAction() {
		switch($this->_action) {
			case 'deleteCookies' : $this->deleteCookies(); break;
			case 'deleteSessions' : $this->deleteSessions(); break;
		}
	}

	private function deleteCookies() {
		foreach($_COOKIE as $cookieName => $cookieValue) {
			setcookie($cookieName, '',  time() - 3600);
		}
	}

	private function deleteSessions() {
		session_destroy();
	}
}
if(isset($_POST['action'])) {
	$CSManagment = new cookieAndSessionManagment($_POST['action']);
	$CSManagment->executeAction();
}
