<?php
echo '<pre>';
require_once 'Module.php';
require_once 'Person.php';
require_once 'PersonModule.php';
require_once 'FtpModule.php';
require_once 'ModuleRunner.php';
$runner = new ModuleRunner();
$runner->init();
echo '</pre>';