<?php

	$xml = new DOMDocument();
	$xml->load('catalog.xml');

	$xsl = new DOMDocument();
	$xsl->load('catalog.xsl');

	$processor = new XSLTProcessor();
	$processor->importStylesheet($xsl);

	echo $processor->transformToXml($xml);
