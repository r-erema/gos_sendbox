<?php
/**
 * Created by PhpStorm.
 * User: GutsOut
 * Date: 06.04.15
 * Time: 22:03
 */

namespace SapperGame;

class Cell {

	protected $isFlagged = false;

	public function __construct() {
		$this->isFlagged = (bool) rand(0, 1);
	}

	public function isFlagged() {
		return $this->isFlagged;
	}

} 