<meta charset="utf-8">
<?php
function __autoload($class) {
	include 'classes/'.$class.'.php';
}
$chel = new Human();
$chel->printHands();
echo Human::HANDS;
echo '<hr>';

$su = new SuperUser('Supa', '123', 'admin');
$su = new SuperUser('Supa', '123', 'admin');
$su = new SuperUser('Supa', '123', 'admin');
$su = new SuperUser('Supa', '123', 'admin');
$su = clone $su;
$su = new User();
$su = new User();
$su = new User();
$su = new User();
$su = new User();
$su = clone $su;
echo 'Всего обычных пользователей: '.User::$countObjects;
echo '<br>';
echo 'Всего супер-пользователей: '.SuperUser::$countObjects;
echo '<hr>';

echo '<h3>Позднее статичесое связывание</h3>';

A::identity();
B::whoAmI();
B::identity();
echo '<hr>';



new C;