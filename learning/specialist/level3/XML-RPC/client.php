<?php
	header('Content-Type: text/html;charset=utf-8');
	$arMessage = [];
	$userid = 1;
	function make_request($request_xml, &$arMessage, $num) {
		$opts = [
			'http' => [
				'method' => 'POST',
				'header' => 'User-Agent: PHPRPC/1.0\r\n' .
					'Content-Type: text/xml\r\n' .
					'Content-length: ' . strlen($request_xml) . '\r\n',
				'content' => "$request_xml"
			]
		];
		$context = stream_context_create($opts);
	}

