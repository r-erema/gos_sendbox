<?php
	class SingletonTestClass {
		private $_msg;
		const LOG_NAME = 'control.log';
		static private $_instance = null;
		private function __construct() {}
		private function __clone() {}

		static function getInstance() {
			if(self::$_instance == null) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function setMessage($msg) {
			$this->_msg = $msg;
		}

		public function getMessage() {
			return $this->_msg;
		}

	}

	$obj = SingletonTestClass::getInstance();
	$obj->setMessage('HW');
	var_dump($obj->getMessage());

	$obj2 = SingletonTestClass::getInstance();
	var_dump($obj2->getMessage());
