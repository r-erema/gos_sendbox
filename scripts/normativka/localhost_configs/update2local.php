<?php

$root = '/home/gutsout/h/normativka';
$portalConfigsPath = "{$root}/portal/__core/Configurations";
$sourcesConfigsPath = "{$root}/localhost_configs";
$portalConfigs = [
    'normativka.ryaroma.web.conf.php',
    'buhgalter.ryaroma.web.conf.php',
    'jurisconsult.ryaroma.web.conf.php',
    'ekonomist.ryaroma.web.conf.php',
    'kadrovik.ryaroma.web.conf.php',
];

$phinxSourceConfig = "{$sourcesConfigsPath}/phinx_normativka.yml";
$phinxTargetConfig = "{$root}/phinx-conf/phinx_normativka.yml";
file_put_contents($phinxTargetConfig, file_get_contents($phinxSourceConfig));

$profinfoSourceConfig = "{$sourcesConfigsPath}/normativka-sites.php";
$profinfoTargetConfig = "{$root}/profinfo/application/configs/normativka-sites.php";
file_put_contents($profinfoTargetConfig, file_get_contents($profinfoSourceConfig));

foreach ($portalConfigs as $config) {
    $sourceConfig = "{$sourcesConfigsPath}/{$config}";
    $targetConfig = "{$portalConfigsPath}/{$config}";
    file_put_contents($targetConfig, file_get_contents($sourceConfig));
}