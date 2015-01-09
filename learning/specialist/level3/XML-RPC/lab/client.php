<?php
	header('Content-Type: text/html;charset=utf-8');
	//Сюда приходят данные с сервера
	$output = [];
	//Основная фнкция
	function make_request($requestXML, &$output) {
		//Начало запроса
		$options = [
			'http' => [
				'method' => 'POST',
				'header' => "User-Agent: PHPRPC/1.0\r\n" .
							"Content-Type: text/xml\r\n" .
							"Content-length: " . strlen($requestXML) . "\r\n",
				'content' => "$requestXML"
			]
		];
		$context = stream_context_create($options);
		$retVal = file_get_contents('http://localhost/learning/specialist/level3/XML-RPC/lab/server.php', false, $context);
		//Конец запроса
		$data = xmlrpc_decode($retVal);
		var_dump($data);
		if(is_array($data) && xmlrpc_is_fault($data)) {
			$output = $data;
		} else {
			$output = unserialize($data);
		}
	}

	$id = 1;
	$requestXML = xmlrpc_encode_request('getNewsById', [$id]);
	make_request($requestXML, $output);
	var_dump($output);