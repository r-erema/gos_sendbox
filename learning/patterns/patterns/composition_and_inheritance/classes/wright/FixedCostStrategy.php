<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;

class FixedCostStrategy extends CostStrategy {
	public function cost(Lesson $lesson) {
		return 30;
	}

	public function chargeType() {
		return 'Фиксированная ставка';
	}

}