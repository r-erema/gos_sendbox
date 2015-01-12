<?php
	class NumberSquared implements Iterator {

		private $_start, $_end, $_curr;

		public function __construct($s, $e) {
			$this->_start = $s;
			$this->_end = $e;
		}

		public function rewind() {
			$this->_curr =$this->_start;
		}

		public function key() {
			return $this->_curr;
		}

		public function current() {
			return pow($this->_curr, 2);
		}

		public function next() {
			$this->_curr++;
		}

		public function valid() {
			return $this->_curr <= $this->_end;
		}

	}
?>
<pre>
<?php
foreach(new NumberSquared(2,5) as $num => $numPow) {
	print "$num^2 = $numPow\n";
}
?>
</pre>