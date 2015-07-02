<?php
require_once '/home/gutsout/h/gos_sendbox/learning/modx/site/connectors/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

/*$corePath = $modx->getOption('doodles.core_path', null, $modx->getOption('core_path') . 'components/doodles/');
require_once $corePath . 'model/doodles/doodles.class.php';*/

/**
 * @var $modx modX
 */

//$modx->doodles = new Doodles($modx);
$doodlesModelPath= $modx->getOption('doodles.core_path', null, $modx->getOption('core_path')) . 'model/doodles/';
$doodles = $modx->getService('Doodles', 'Doodles', $doodlesModelPath);
$modx->lexicon->load('doodles:default');

/*Обработка запроса*/
$processorsPath = $modx->getOption('processorsPath', $doodles->config, $corePath . 'processors');
$r = $modx->request->handleRequest(array(
	'processors_path' => $processorsPath,
	'location' => ''
));
$i = 1;

