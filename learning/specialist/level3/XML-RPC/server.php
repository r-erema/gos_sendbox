<?php
	$arStock = ['1' => 100, '2' => 200, '3' => 300];

	function get_stock($methodNamem, $args, $extra) {
		if(!is_array($args) || count($args) != 2) {
			return ['faultCode' => -2, 'faultString' => 'Неверное количество параметров!'];
		}
		$user = $args[0];
		$num = $args[1];
		if(array_key_exists($num, $GLOBALS['arStock'])) {
			return "На полке номер $num " . $GLOBALS['arStock'][$num] . ' товаров';
		} else {
			return ['faultCode' => -1, 'faultString' => "Полка номер $num отсутсвует"];
		}
	}

	$reuest_xml = file_get_contents('php://input');

	$xmlrpcServer = xmlrpc_server_create();
	xmlrpc_server_register_method($xmlrpcServer, 'getStock', 'get_stock');