<?php

require 'smarty-2.6.28/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->compile_check = true;

$smarty->register_function('Func', 'func');

function func($params) {
	return $params['x'] * $params['y'];
}
echo $smarty->fetch('index.tpl');