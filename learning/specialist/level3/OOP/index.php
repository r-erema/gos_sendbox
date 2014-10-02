<meta charset="utf-8">
<?php
	class User {
		public $name;
		public $login;
		public $password;

		public function __construct($name = null, $login = null, $pass = null) {
			try {
				if(!$name) {
					throw new Exception('Не указано имя!');
				}
				$this->name = $name;
			} catch(Exception $e) {
				echo $e->getMessage();
			}
			$this->login = $login;
			$this->password = $pass;
		}

		public function User() {
			echo 'construct';
		}

		public function __destruct() {
			echo "$this->login мёртв, бедный $this->name<br>";
		}

		public function showInfo() {
			echo "
				<p>Имя: $this->name</p>
				<p>Логин: $this->login</p>
				<p>Пароль: $this->password</p>
			";
		}

		public function getClassName() {
			return __CLASS__;
		}

		public function getMethodNameWithClassName() {
			return __METHOD__;
		}

		public function getMethodName() {
			return __FUNCTION__;
		}

	}

$user = new User('Вольдемар', 'Vold', '123');
$user->showInfo();
echo '<hr>';

$user2 = new User('Жора', 'nasos', 'aroj');
$user2->showInfo();
echo '<hr>';

$user3 = new User('Rocky', 'ItalianStallion', 'knock-out');
$user3->showInfo();
echo '<hr>';

echo $user->getClassName();
echo '<hr>';

echo $user->getMethodNameWithClassName();
echo '<hr>';

echo $user->getMethodName();
echo '<hr>';

$user4 = new User();

class MyExceptionOne extends Exception {
	public function __construct($msg) {
		parent::__construct($msg);
	}
}

class MyExceptionTwo extends Exception {
	public function __construct($msg) {
		parent::__construct($msg);
	}
}

class Animal {
	public $name;
	public $age;

	public function __construct($n=null, $a=0) {
		try {
			if(!$n) {
				throw new MyExceptionOne('Нет имени');
			}
			if(!$a) {
				throw new MyExceptionTwo('Не указан возраст');
			}
			if(!isset($z)) {
				throw new MyExceptionTwo('Нет z');
			}
			$this->name = $n;
			$this->age = $a;

		} catch(Exception $e) {
			echo 'Here '.$e->getMessage();
		} catch(MyExceptionTwo $e) {
			echo $e->getMessage();
		} catch(MyExceptionOne $e) {
			echo $e->getMessage();
		}

	}
}
echo '<hr>';
$animal = new Animal('Vaska', 5);
echo '<hr>';
$animal = new Animal('Bobik');
echo '<hr>';
$animal = new Animal(null, 7);