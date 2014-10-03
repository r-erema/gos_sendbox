<meta charset="utf-8">
<?php
	class User {
		public $name;
		public $login;
		public $password;

		public function __construct($name, $login, $pass) {
			$this->name = $name;
			$this->login = $login;
			$this->password = $pass;
		}

		public function __destruct() {
			echo "<span style='color: #af0000'>Деструктор:</span> $this->login мёртв, бедный $this->name<br>";
		}

		public function __clone() {
			echo "<span style='color: #4baf53'>Клонирование:</span> Объект с именем $this->name клонирован<br>";
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

$user4 = clone $user3;
$user4->showInfo();

class SuperUser extends User {
	public $role;

	public function __construct($name, $login, $pass, $role) {
		parent::__construct($name, $login, $pass);
		$this->role = $role;
	}
	public function showInfo() {
		parent::showInfo();
		echo "<p>Пароль: $this->role</p>";
	}
}

$user5 = new SuperUser('Super', 'Vasya', '345', 'admin');
echo '<hr>';
$user5->showInfo();
echo '<hr>';