<?php
	error_reporting(E_ALL);
	class A implements Serializable{
		private $varA;
		public function __construct() {
			$this->varA = 'A';
		}
		public function serialize() {
			return serialize($this->varA);
		}
		public function unserialize($ser) {
			$this->varA = unserialize($ser);
		}
		public function showVar() {
			echo $this->varA . "\n";
		}
	}

	class B extends A {
		private $varB;
		public function __construct() {
			parent::__construct();
			$this->varB = 'B';
		}
		public function __sleep() {
			return ['varB', 'varA'];
		}
		public function serialize() {
			$aSer = parent::serialize();
			$bSer = serialize($this->varB);
			return serialize([$this->varB, $aSer]);
		}
		public function unserialize($ser) {
			$tmp = unserialize($ser);
			$this->varB = $tmp[0];
			parent::unserialize($tmp[1]);
		}
	}

	$obj = new B();
	$ser = serialize($obj);
	echo $ser . "\n";
	$unser = unserialize($ser);
	var_dump($unser);