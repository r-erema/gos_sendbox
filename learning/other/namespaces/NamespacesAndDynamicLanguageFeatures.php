<?php
namespace nSpace;
class className {
	public function __construct() {
		echo __METHOD__ . "\n";
	}
}

function funcName() {
	echo __FUNCTION__,"\n";
}
const CONSTNAME = "global\n";

$a = 'nSpace\className';
$obj = new $a;
$b = 'nSpace\funcName';
$b();
echo constant('nSpace\CONSTNAME');