<?php

const URL = 'http://localhost/learning/specialist/level4/curl/put.txt';

/*
$curl = curl_init();

$str = "Hello, world!";
$fp = tmpfile();
fwrite($fp, $str);
fseek($fp, 0);

curl_setopt($curl, CURLOPT_URL, URL);
curl_setopt($curl, CURLOPT_PUT, true);
curl_setopt($curl, CURLOPT_INFILE, $fp);
curl_setopt($curl, CURLOPT_INFILESIZE, strlen($str));

$result = curl_exec($curl);
fclose($fp);
curl_close($curl);
**/

$data = ['a' => 123];
$ch = curl_init(URL);
var_dump($ch);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

$response = curl_exec($ch);
var_dump($response);
if(!$response) {
	return false;
}