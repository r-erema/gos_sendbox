<?php

$ch = curl_init('https://falcongaze.com/buy/iran.html');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
if (!preg_match('#Arman Data Pouyan#', $html)) {
	mail ('r.yaroma@normativka.by', 'Пропал партнёр', 'falcongaze Пропал партнёр', 'From:no-reply@gmail.com');
};