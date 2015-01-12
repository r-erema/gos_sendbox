<?php
	class MyIterator implements Iterator {
		public $var = [];

		public function __construct(array $arr) {
			$this->var = $arr;
		}

		public function rewind() {
			echo "rewinding<br />\n";
			reset($this->var);
		}

		public function current() {
			$curr = current($this->var);
			echo "current: $curr<br />\n";
			return $curr;
		}

		public function key() {
			$key = key($this->var);
			echo "key: $key<br />\n";
			return $key;
		}

		public function next() {
			$next = next($this->var);
			echo "next: $next<br />\n";
			return $next;
		}

		public function valid() {
			$var = $this->current() !== false;
			echo "valid: $var<br />\n";
			return $var;
		}
	}

	$iter = new MyIterator([1,2,3]);

	foreach($iter as $k => $v) {
		//echo "$k => $v<br />\n";
	}
