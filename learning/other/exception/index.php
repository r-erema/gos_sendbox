<meta charset="utf-8">
<?php

function inverse($x) {
	if(!is_array($x)) {
		throw new Exception('Not Array');
	}
	foreach($x as $k => $v) {
		echo $v;
	}
}
try {
	inverse(88);
} catch (Exception $e) {
	echo $e->getMessage();
}

echo 23;


