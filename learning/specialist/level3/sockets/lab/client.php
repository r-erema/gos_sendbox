<?php
	function call_socket($remoteServer, $remoteServerPort, $remotePath, $request) {
		$socket = fsockopen($remoteServer, $remoteServerPort, $errorNo, $errorMsg, 30);
		if(!$socket) {
			die("$errorMsg ($errorNo)");
		}

		$message = "POST $remotePath HTTP/1.1\r\n" .
					"User-Agent: PHPRPC/1.0\r\n" .
					"Host: $remoteServer\r\n" .
					"Content-type: text/xml\r\n" .
					"Content-length: " . strlen($request) . "\r\n".
					"Accept: */*".
					"\r\n\r\n".

					"$request".
					"\r\n\r\n";
		fputs($socket, $message);

		$headers = "";
		while($str = trim(fgets($socket, 4096))) {
			$headers .= "$str\n";
		}
		$data = "";
		while (!feof($socket)) {
			$data .= fgets($socket, 4096);
		}
		fclose($socket);
		return $data;
	}

	function make_request($requestXML, &$output) {
		$retVal = call_socket('localhost', 80, '/learning/specialist/level3/XML-RPC/lab/server.php', $requestXML);
		$data = xmlrpc_decode($retVal);
		var_dump($data);
	}
$id = 2;
$requestXML = xmlrpc_encode_request('getNewsById', [$id]);
make_request($requestXML, $output);