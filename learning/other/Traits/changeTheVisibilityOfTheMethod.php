<meta charset="utf-8">
<h1>Изменение видимости метода</h1>
<?php
trait HelloWorld {
	public function sayHello() {
		echo 'Hello World';
	}

	public function getPublicSayHello() {
		return $this->sayHello();
	}
}

class MyClass1 {
	use HelloWorld {
		sayHello as protected;
	}
}

class MyClass2 {
	use HelloWorld {
		sayHello as private myPrivateHello;
	}
	public function getPrivateHello() {
		return $this->myPrivateHello();
	}
}

$mc1 = new MyClass1();
$mc2 = new MyClass2();

$mc1->getPublicSayHello();
$mc2->getPrivateHello();