<?php
namespace nSpace;

	class A{};

	function get($className) {
		$a = __NAMESPACE__ . '\\' . $className;
		return new $a;
	}

	print_r(get('A'));