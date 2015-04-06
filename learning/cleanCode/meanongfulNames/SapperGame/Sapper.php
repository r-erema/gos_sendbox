<?php
/**
 * Created by PhpStorm.
 * User: GutsOut
 * Date: 06.04.15
 * Time: 21:45
 */


namespace SapperGame;

class Sapper {

	public $theList = [
		0 => [
			0 => 0
		],
		1 => [
			0 => 4
		],
		2 => [
			0 => 4
		],
		3 => [
			0 => 0
		],
		5 => [
			0 => 4
		],
	];
	public $gameBoard = [];
	const CELLS_COUNT = 100;

	const STATUS_VALUE = 0;
	const FLAGGED = 4;

	public function __construct() {
		for ($counter = 0; $counter < self::CELLS_COUNT; $counter++) {
			$this->gameBoard[] = new Cell();
		}
	}

	//Плохой код
	/*public function getThem () {
		$list1 = array();
		foreach ($this->theList as $x) {
			if ($x[0] == 4) {
				$list1[] = $x;
			}
		}
		return $list1;
	}*/

	//Чуть лучше
	/*public function getFlaggedCells() {
		$flaggedCells = [];
		foreach ($this->gameBoard as $cell) {
			if ($cell[self::STATUS_VALUE] == self::FLAGGED) {
				$flaggedCells[] = $cell;
			}
		}
		return $flaggedCells;
	}*/

	//Еще лучше
	public function getFlaggedCells() {
		$flaggedCells = [];
		foreach ($this->gameBoard as $key => $cell) {
			if ($cell->isFlagged()) {
				$flaggedCells[$key] = $cell;
			}
		}
		return $flaggedCells;
	}
}