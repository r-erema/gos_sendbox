<meta charset="utf-8">
<h1>Несколько трейтов</h1>
<?php

trait Hello {
	public function sayHello() {
		echo 'Hello';
	}
}

trait World {
	private function sayWorld() {
		echo 'World';
	}
}

class MyHelloWorld {
	use Hello, World;
	public function sayHelloWorld(){
		$this->sayHello();
		$this->sayWorld();
	}
}

$o = new MyHelloWorld();
$o->sayHelloWorld();