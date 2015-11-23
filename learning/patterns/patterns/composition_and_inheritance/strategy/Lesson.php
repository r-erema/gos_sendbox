<?php

abstract class Lesson {

	protected $duration;
	private $costStrategy;

	/**
	 * @param $duration
	 * @param CostStrategy $strategy
	 */
	public function __construct($duration, CostStrategy $strategy) {
		$this->duration = $duration;
		$this->costStrategy = $strategy;
	}

	public function cost() {
		return $this->costStrategy->cost($this);
	}

	public function chargeType() {
		return $this->costStrategy->chargeType();
	}

	public function getDuration() {
		return $this->duration;
	}
}