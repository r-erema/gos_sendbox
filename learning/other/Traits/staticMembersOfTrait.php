<meta charset="utf-8">
<h1>Статические члены трейта</h1>
<?php

trait Counter {
	public static $r = 6;
	public function inc() {
		static $c = 0;
		$c = $c + 1;
		echo "$c<br>";
	}
}

class C1 {
	use Counter;
}

class C2 {
	use Counter;
}

$o = new C1; $o->inc();
$p = new C2; $p->inc();


trait StaticExample {
	public static function doSomething() {
		return 'do something';
	}
}

class Example {
	use StaticExample;
}

echo Example::doSomething();