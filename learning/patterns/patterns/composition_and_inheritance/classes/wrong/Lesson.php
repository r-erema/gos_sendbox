<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wrong;


abstract class Lesson {
	protected $duration;

	const FIXED = 1;
	const TIMED = 2;
	private $costType;

	/**
	 * Lesson constructor.
	 * @param $duration
	 * @param $costType
	 */
	public function __construct($duration, $costType) {
		$this->duration = $duration;
		$this->costType = $costType;
	}

	public function cost() {
		switch ($this->costType) {
			case self::TIMED : return (5 * $this->duration); break;
			case self::FIXED : return 30; break;
			default : $this->costType = self::FIXED; return 30; break;
		}
	}

	public function chargeType() {
		switch ($this->costType) {
			case self::TIMED : return 'Почасовая оплата'; break;
			case self::FIXED : return 'Фиксированая ставка'; break;
			default : $this->costType = self::FIXED; return 'Фиксированая ставка'; break;
		}
	}
}