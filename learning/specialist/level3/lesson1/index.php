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

$user3 = new User('Rocky', 'ItalianStalion', 'knock-out');
$user3->showInfo();
echo '<hr>';

echo $user->getClassName();
echo '<hr>';

echo $user->getMethodNameWithClassName();
echo '<hr>';

echo $user->getMethodName();
echo '<hr>';