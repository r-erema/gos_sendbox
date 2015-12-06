<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;


abstract class CostStrategy {
	abstract function cost(Lesson $lesson);
	abstract function chargeType();
}