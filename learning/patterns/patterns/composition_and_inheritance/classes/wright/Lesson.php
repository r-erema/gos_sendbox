<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;


abstract class Lesson {
	private $duration;

	/**
	 * @var $costStrategy CostStrategy
	 */
	private $costStrategy;

	/**
	 * Lesson constructor.
	 * @param $duration
	 * @param CostStrategy $costStrategy
	 */
	public function __construct($duration, CostStrategy $costStrategy) {
		$this->duration = $duration;
		$this->costStrategy = $costStrategy;
	}


	/**
	 * @return mixed
	 */
	public function cost() {
		return $this->costStrategy->cost($this);
	}

	public function chargeType() {
		return $this->costStrategy->chargeType();
	}

	/**
	 * @return mixed
	 */
	public function getDuration() {
		return $this->duration;
	}

}