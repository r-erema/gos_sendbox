<?php
require_once (dirname(dirname(__FILE__)) . '/doodle.class.php');
class Doodle_mysql extends Doodle{
	public function __construct(& $xpdo) {
		parent :: __construct($xpdo);
	}
}