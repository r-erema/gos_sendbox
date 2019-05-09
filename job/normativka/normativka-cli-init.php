<?php
/** @var $config array*/
$shellCommands = 'export APPLICATION_CLASS_NAME=Nr_Application'. PHP_EOL;
$shellCommands .= 'export SITE_NAME=normativka.by'. PHP_EOL;
$shellCommands .= "export APPLICATION_ENV={$config['normativka_env']}" . PHP_EOL;
$shellCommands .= "export APPLICATION_PATH={$config['normativka_path']}/profinfo/application". PHP_EOL;
$shellCommands .= "export APPLICATION_STATE_FILE={$config['normativka_path']}/site_state". PHP_EOL;
$shellCommands .= "PORTAL_ROOT_PATH={$config['normativka_portal_path']}". PHP_EOL;
$shellCommands .= "DOMAIN_NORMATIVKA={$config['normativka_domain']}". PHP_EOL;
return $shellCommands;
