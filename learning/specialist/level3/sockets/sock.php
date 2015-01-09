<?php
	/**
	 * Сокетное соединение
	 * Создаем сокет (host+порт)
	 */
	$socket = fsockopen('localhost', 80, $sockErrorNo, $sockErrorMsg, 30);

	/**
	 * Создаем POST-строку
	 */
	$strQuery = "name=John&age=25";

	/**
	 * Посылка HTTP-запроса
	 */
	$httpRequest = "POST /learning/specialist/level3/sockets/ HTTP/1.1\r\n" .
					"Host: localhost\r\n" .
					"Content-Type: application/x-www-form-urlencoded\r\n" .
					"Content-length: " . strlen($strQuery) .
					"\r\n\r\n".
					$strQuery;

	fwrite($socket, $httpRequest);
	while (!feof($socket)) {
		echo fgets($socket);
	}
	fclose($socket);