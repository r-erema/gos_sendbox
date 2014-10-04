<meta charset="utf-8">
<h1>Трейты, скомпонованные из трейтов</h1>
<?php
	trait Hello {
		public function sayHello() {
			echo 'Hello ';
		}
	}


	trait World {
		public function sayWorld() {
			echo 'World';
		}
	}

	trait HelloWorld {
		use Hello, World;
	}

	class MyHelloWorld {
		use HelloWorld;
		public function sayHelloWorld() {
			$this->sayHello();
			$this->sayWorld();
		}
	}

	$hw = new MyHelloWorld();
	$hw->sayHelloWorld();