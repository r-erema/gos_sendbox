<?php

	$arr = [1, 2, 3, 4, 5];

	function mult($v) {
		return $v * 10;
	}
	$newArr = array_map('mult', $arr);
	var_dump($newArr);

	$newArr = array_map(create_function('$v', 'return $v*20;'), $arr);
	var_dump($newArr);

	$newArr = array_map(function($v) {return $v * 30;}, $arr);
	var_dump($newArr);

	function Hello($name) {
		echo "Hello $name!";
	}
	$func = 'Hello';
	$func('Sema');

	$func = function($name) {
		echo "Hello $name!";
	};
	var_dump($func);
	$func('Dasha');

/*--------------*/echo '<hr>';

	$str = "Hello";
	$closure = function() use($str) {echo $str;};
	$closure();

	$add = function($num) {
		return function($x) use ($num) {
			return $x * $num;
		};
	};

	$add7 = $add(7);
	var_dump($add7(5));

	class User {
		private $_name;
		public function  __construct($name) {
			$this->_name = $name;
		}
		public function sayHello($greeting) {
			return function() use($greeting) {
				echo "$greeting $this->_name!";
			};
		}
	}

	$u = new User('Vasya');
	$sh = $u->sayHello('Hello');
	$sh();

/*--------------*/echo '<hr>';
