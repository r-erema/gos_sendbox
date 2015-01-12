<?php
	class ArrAccsExample implements ArrayAccess {
		private $_arr;
		public function __construct($arr) {
			$this->_arr = $arr;
		}

		public function offsetExists($offset) {
			echo "Элемент с индексом $offset " . (isset($this->_arr[$offset]) ? '' : 'не ') . "существует\n";
		}

		public function offsetGet($offset) {
			echo "Доступ к элементу $offset, значение: {$this->_arr[$offset]}\n";
		}
		public function offsetSet($offset, $value) {
			$this->_arr[$offset] = $value;
			echo "Элементу $offset, присвоено значение: $value\n";
		}
		public function offsetUnset($offset) {
			unset($this->_arr[$offset]);
			echo "Элемент $offset уничтожен\n";
		}
	}

	$a = new ArrAccsExample([1,2,3,4]);
	echo "<pre>";
	isset($a[3]);
	echo $a[2];
	$a[0] =100500;
	echo $a[0];
	unset($a[3]);
	isset($a[3]);




echo "</pre>";