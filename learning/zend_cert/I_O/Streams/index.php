<?php

$localFile = file_get_contents('/home/gutsout/h/gos_sendbox/learning/zend_cert/I_O/Streams/file.txt');
$localFile = file_get_contents('file://home/gutsout/h/gos_sendbox/learning/zend_cert/I_O/Streams/file.txt');
$localFile = file_get_contents('http://gutsout.web/learning/zend_cert/I_O/Streams/file.txt');
$localFile = file_get_contents('https://securenews.ru/');
$localFile = file_get_contents('ftp://ftp.flynet.by/soft/Arhivators/Russian/rarreg.key');

$t = 11;