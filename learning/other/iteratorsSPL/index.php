<style>
	ul {
		list-style-type: none
	}
</style>
<?php
	const ROOT_PATH = "/dev/server/domains/localhost/htdocs";

	$arr = [
		"sitepoint",
		"phpmaster",
		"buildmobile",
		"rubysource",
		"designfestival",
		"cloudspring"
	];

	$multiArr = [
		["sitepoint", "phpmaster"],
		["buildmobile", "rubysource"],
		["designfestival", "cloudspring"],
		"not an array"
	];
?>

<h3>ArrayIterator</h3>
<ul>
<?php
	$arrIter = new ArrayIterator($arr);
	foreach($arrIter as $k => $v):
?>
	<li><?php echo $k; ?> => <?php echo $v; ?></li>
<?php endforeach; ?>
</ul>
<hr />

<h3>RecursiveArrayIterator</h3>
<ul>
<?php
	$recArrIter = new RecursiveArrayIterator($multiArr);
	$recIterIter = new RecursiveIteratorIterator($recArrIter);
	foreach($recIterIter as $k => $v):
?>
	<li><?php echo $k; ?> => <?php echo $v; ?></li>
<?php endforeach; ?>
</ul>
<hr />

<h3>DirecoryIterator</h3>
<ul>
<?php
	try {
		$dirIter = new DirectoryIterator(ROOT_PATH);
		foreach($dirIter as $item):
?>
			<li><?php echo $item; ?> [<?php echo $item->getSize(); ?> byte]</li>
<?php endforeach;
	} catch (Exception $e) {
		echo get_class($e) . ": " . $e->getMessage();
	}
?>
</ul>
<hr />

<h3>FilterIterator + DirectoryIterator</h3>
<?php
	class FileExtensionFilter extends FilterIterator {
		protected $ext = ["php", "txt"];

		public function accept() {
			return in_array($this->getExtension(), $this->ext);
		}
	}
	$fileExtFilter = new FileExtensionFilter(new DirectoryIterator(ROOT_PATH));
?>
<ul>
<?php foreach($fileExtFilter as $item): ?>
	<li><?php echo $item; ?> [<?php echo $item->getSize(); ?> byte]</li>
<?php endforeach; ?>
</ul>
<hr />

<h3>RecursiveDirectoryIterator</h3>
<?php
	$recDirIter = new RecursiveDirectoryIterator(ROOT_PATH);
?>
<ul>
	<?php foreach(new RecursiveIteratorIterator($recDirIter) as $item): ?>
		<li><?php echo $item; ?> [<?php echo $item->getSize(); ?> byte]</li>
	<?php endforeach; ?>
</ul>
<hr />

<h3>Iterator</h3>
<?php
	class Library implements Iterator {
		protected $currPos = 0;
		protected $books = [
			"Professional PHP Programming",
			"Programming Perl",
			"A Byte of Python",
			"The Ruby Way"
		];

		public function rewind() {
			echo "rewinded<br />";
			$this->currPos = 0;
		}

		public function current() {
			echo "current<br />";
			return $this->books[$this->currPos];
		}

		public function key() {
			echo "key<br />";
			return $this->currPos;
		}

		public function next() {
			echo "next<br />";
			++$this->currPos;
		}

		public function valid() {
			echo "valid<br/>";
			return isset($this->books[$this->currPos]);
		}
	}

	$lib = new Library();
?>

<ul>
	<?php foreach($lib as $index => $book): ?>
		<li><?php echo $index; ?> => <?php echo $book; ?></li>
	<?php endforeach; ?>
</ul>
<hr />

<h3>IteratorAggregate</h3>
<?php
	class Library2 implements IteratorAggregate {
		protected $books = [
			"Professional PHP Programming",
			"Programming Perl",
			"A Byte of Python",
			"The Ruby Way"
		];

		public function getIterator() {
			echo "getIterator<br />";
			return new ArrayIterator($this->books);
		}
	}
	$lib = new Library();
?>
<ul>
	<?php foreach($lib as $index => $book): ?>
		<li><?php echo $index; ?> => <?php echo $book; ?></li>
	<?php endforeach; ?>
</ul>
<hr />