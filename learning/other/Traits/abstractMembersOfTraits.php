<meta charset="utf-8">
<h1>Абстрактные члены трейтов</h1>
<?php
	trait Hello {
		public function sayHelloWorld() {
			echo 'Hello'.$this->getWorld();
		}
		abstract public function getWorld();
	}

	class MyHelloWorld {
		private $world;
		use Hello;
		public function getWorld() {
			return $this->world;
		}
		public function setWorld($val) {
			$this->world = $val;
		}
	}

	$mHW = new MyHelloWorld();
	$mHW->setWorld('Minsk');
	$mHW->sayHelloWorld();