<?php
	class Action {
		private $_name;
		public function __construct($actName) {
			$this->_name = $actName;
		}
		public function doAction() {
			echo "{$this->_name} done<br />";
		}
	}

	$act1 = new Action('drink');
	$act2 = new Action('fuck');

	$queue = new SplQueue();
	$queue->enqueue($act2);
	$queue->enqueue($act1);

	foreach ($queue as $action) {
		$action->doAction();
	}

	echo "<hr />";

	$priorQueue = new SplPriorityQueue();
	$act1 = new Action('read');
	$act2 = new Action('eat');
	$act3 = new Action('sing');
	$act4 = new Action('drink');

	$priorQueue->insert($act1,1);
	$priorQueue->insert($act2,22);
	$priorQueue->insert($act3,55);
	$priorQueue->insert($act4,3);

	foreach ($priorQueue as $action) {
		$action->doAction();
	}