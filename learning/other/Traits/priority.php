<meta charset="utf-8">
<h1>Приоритет трейтов</h1>
<?php

	class Base {
		public function sayHello() {
			echo 'Hello';
		}
	}

	trait SayWorld {
		public function sayHello() {
			parent::sayHello();
			echo 'World';
		}
	}

	class MyHelloWorld extends Base {
		use SayWorld;
	}

	$o = new MyHelloWorld();
	$o->sayHello();

/*
	trait HelloWorld {
		public function sayHello() {
			echo 'Hello World!';
		}
	}

	class TheWorldIsNotEnough {
		use HelloWorld;
		public function sayHello() {
			echo 'Hello Universe!';
		}
	}

	$o = new TheWorldIsNotEnough();
	$o->sayHello();*/