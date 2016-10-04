<?php
set_include_path('/home/gutsout/h/gos_sendbox/htdocs/learning/zend_cert/tmp/'. PATH_SEPARATOR . '/home/gutsout/h/gos_sendbox/htdocs/learning/zend_cert/');
$rg = 123;

//$f = require 'http://gutsout.web/learning/zend_cert/tmp/inc.php?a=21&b=736';
$a = include 'tmp/inc.php';
$b = include 'tmp/inc.php';
$b = include_once 'tmp/inc.php';
/*$c = require_once 'tmp/inc.php';
$d = require_once 'tmp/inc.php';*/
EXIT;