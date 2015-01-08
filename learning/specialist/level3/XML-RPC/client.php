<?php
	header('Content-Type: text/html;charset=utf-8');
	$arMessage = [];
	$userId = 1;
	function make_request($request_xml, &$arMessage, $num) {
		$opts = [
			'http' => [
				'method' => 'POST',
				'header' => 'User-Agent: PHPRPC/1.0\r\n' .
					'Content-Type: text/xml\r\n' .
					'Content-length: ' . strlen($request_xml) . '\r\n',
				'content' => $request_xml
			]
		];
		$context = stream_context_create($opts);
		$retVal = file_get_contents('http://localhost/learning/specialist/level3/XML-RPC/server.php', false, $context);
		$data = xmlrpc_decode($retVal);
	}

	$num = "10";
	$requestXML = xmlrpc_encode_request('getStock', [$userId, $num]);
	make_request(1,$requestXML, 1);
