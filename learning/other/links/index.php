<meta charset="UTF-8">

<h1>Как работают ссылки в PHP</h1>
<h3>Простейшая ситуация</h3>
<?php
	$foo = 5;
	$bar = &$foo;
	$foo = 6;
?>
<p>
	<code>
		$foo = 5;<br>
		$bar =& $foo;
	</code>
</p>
<img src="img/02.png">
<hr>


<h3>Удаление Переменных</h3>
<?php
	$foo = 5;
	$bar = &$foo;
	unset($foo);
	unset($bar);
?>
<p>
	<code>
		unset($foo);
	</code>
</p>
<img src="img/03.png">
<hr>

<h3>Массивы</h3>
<?php
$arr = [
	1 => 10,
	2 => 20,
	3 => 30,
];

?>
<p>
	<code>
		$arr = [<br>
		&emsp;1 => 10,<br>
		&emsp;2 => 20,<br>
		&emsp;3 => 30,<br>
		];
	</code>
</p>
<img src="img/05.png">
<p>
	<code>
		$foo = &$arr;<br>
		$bar = &$arr[2];<br>
	</code>
</p>
<img src="img/06.png">
<p>
	<code>
		$arr[1] = $arr[2];
	</code>
</p>
<img src="img/07.png">
<p>
	<code>
		$arr[2] = &$arr[3];
	</code>
</p>
<img src="img/08.png">
<p>
	<code>
		unset($arr);
	</code>
</p>
<img src="img/09.png">
<p>
	<code>
		$foo = 42;
	</code>
</p>
<img src="img/10.png">
<hr>

<h1>Неявные ссылки</h1>
	<?php
	$foo = 5;
	function bar() {
		$v = &$foo;
		//global $foo;
		$v = 10;

	}
	bar();
	echo $foo;

	function bar2() {
		static $foo = 0;
		$foo++;
		unset($foo);
		$foo = 21;
		var_dump($foo);
	}

	bar2();
	?>
<hr>

<h1>Ссылка на Ссылку объекта</h1>
<?php
class Bar {
	public function lol() {
		echo 'lol';
	}
}
function foo3(Bar $bar) {
	$bar->lol();
	$bar = null;
}
$a = new Bar();
var_dump($a);
foo3($a);
var_dump($a);
?>
<hr>

<h1>Копирование при записи (Copy on write)</h1>
<?php
echo memory_get_usage();
$foo = str_repeat('foobar', 32768);
var_dump($foo);
?>
<hr>
