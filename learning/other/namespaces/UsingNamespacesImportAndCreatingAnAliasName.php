<?php
namespace a\b\c;
class A {
	public function __construct() {
		echo 'namespace a\b\c';
	}
}

namespace a\b;
class A {
	public function __construct() {
		echo 'namespace a\b';
	}
}