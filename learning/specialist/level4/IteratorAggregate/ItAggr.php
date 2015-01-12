<?php
	require_once '../Iterator/iterator.php';
	require_once '../Iterator/numberSquared.php';

	class MyCollection implements IteratorAggregate {
		private $items = [];
		private $count = 0;
		public function getIterator() {
			return new MyIterator($this->items);
		}
		public function add($value) {
			$this->items[$this->count++] = $value;
		}
	}

	$coll = new MyCollection();
	$coll->add('value 1');
	$coll->add('value 2');
	$coll->add('value 3');
	echo '<pre>';
	foreach($coll as $k => $v) {
		echo "k/v: [$k -> $v]\n\n";
	}
echo '</pre>';