<?php
/**
 * Запускать под root
 */


$config = require __DIR__ . '/config.php';

/** @var array $servers */
$servers = $config['servers'];

$nginxFileName = null;
$apacheFileName = null;
$nginxText = '';
$apacheText = '';
foreach ($servers as $server) {
    switch ($server['name']) {
        case NGINX :
            /** @var array $domains */
            $domains = $server['domains'];
            $allDomains = array_merge(...array_map(function ($domain) {return $domain['names'];}, $domains));
            $nginxText .= str_replace(
                ['%%all_domains%%'],
                [implode(' ', $allDomains)],
                $server['tpl_http_to_https']
            );
            foreach ($domains as $domain) {
                $domainNamesString = implode(' ', $domain['names']);
                $nginxText .= str_replace(
                    ['%%domains%%', '%%proxy_to%%'],
                    [$domainNamesString, $domain['names'][0]],
                    $server['tpl']
                );
            }
            $nginxFileName = $server['file_name'];
            break;
        case APACHE :
            $domain = $server['domain'];
            $names = $domain['names'];
            $serverName = array_shift($names);
            $aliases = $names;
            $aliasesString = implode(' ', $aliases);
            $apacheText .= str_replace(
                ['%%server_admin%%', '%%document_root%%', '%%server_name%%', '%%server_aliases%%'],
                [$config['server_admin'], $config['document_root'], $serverName, $aliasesString],
                $server['tpl']
            );
            $apacheFileName = $server['file_name'];
            break;
    }
}
if ($nginxFileName && $apacheFileName) {

    //Удаляем старое...
    `a2dissite {$apacheFileName}`;
    `rm /etc/nginx/sites-enabled/{$nginxFileName} /etc/nginx/sites-available/{$nginxFileName}`;
    `rm /etc/apache2/sites-available/$apacheFileName`;
    `rm -rf /var/log/nginx/{$config['main_name']}`;
    `rm -rf /var/log/apache2/{$config['main_name']}`;

    //Создаём новое
    //nginx
    `touch /etc/nginx/sites-available/{$nginxFileName}`;
    `ln -s /etc/nginx/sites-available/{$nginxFileName} /etc/nginx/sites-enabled/{$nginxFileName}`;
    `echo "$nginxText" >> /etc/nginx/sites-available/{$nginxFileName}`;
    `mkdir /var/log/nginx/{$config['main_name']}`;
    `service nginx reload`;
    //apache
    `touch /etc/apache2/sites-available/{$apacheFileName}`;
    `echo "$apacheText" >> /etc/apache2/sites-available/{$apacheFileName}`;
    `mkdir /var/log/apache2/{$config['main_name']}`;
    `a2ensite {$apacheFileName}`;
    `service apache2 reload`;

}
