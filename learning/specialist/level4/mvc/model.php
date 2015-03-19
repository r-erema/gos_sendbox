<?php
	$db = [
		[
			'id' => 1,
			'name' => 'Kolya',
			'age' => 14
		],
		[
			'id' => 23,
			'name' => 'Masha',
			'age' => 32
		],
		[
			'id' => 13,
			'name' => 'Jora',
			'age' => 22
		]
	];

	function fetch() {
		global $db;
		return $db;
	}