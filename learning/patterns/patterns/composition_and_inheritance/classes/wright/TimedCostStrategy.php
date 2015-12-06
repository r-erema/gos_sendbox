<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;

class TimedCostStrategy extends CostStrategy {
	public function cost(Lesson $lesson) {
		return $lesson->getDuration() * 5;
	}

	public function chargeType() {
		return 'Почасовая оплата';
	}

}