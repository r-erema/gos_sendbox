<?php
const NGINX = 'nginx';
const APACHE = 'apache2';

const DOMAIN_POSTFIX = '.ryaroma.web';

const MAIN_NAME = 'fg-new';

const NGINX_TPL_HTTP_TO_HTTPS =
'server {
    listen 80;
    server_name %%all_domains%%;
    return 301 https://\$server_name\$request_uri;
}' . PHP_EOL . PHP_EOL;

const NGINX_TPL =
    'server {
    listen 443;
    server_name %%domains%%;
    access_log  /var/log/nginx/' . MAIN_NAME . '/access.log;
    error_log  /var/log/nginx/' . MAIN_NAME . '/access.log;

    location / {
        proxy_pass http://%%proxy_to%%:8080;
    }

    ssl on;
    ssl_certificate /etc/ssl/cert.pem;
    ssl_certificate_key /etc/ssl/cert.key;
}' . PHP_EOL . PHP_EOL;

const APACHE_TPL =
    '<VirtualHost *:8080>

    ServerAdmin %%server_admin%%
    DocumentRoot %%document_root%%
    ServerName %%server_name%%
    ServerAlias %%server_aliases%%

    <Directory "%%document_root%%" >
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
    </Directory>

    ErrorLog /var/log/apache2/' . MAIN_NAME . '/error.log
    CustomLog /var/log/apache2/' . MAIN_NAME . '/access.log combined
    LogLevel warn

</VirtualHost>' . PHP_EOL . PHP_EOL;

return [
    'server_admin' => 'r.yaroma@corp.profigroup.by',
    'document_root' => '/home/gutsout/h/fg-new/htdocs',
    'main_name' => MAIN_NAME,
    'servers' => [
        [
            'name' => NGINX,
            'file_name' => MAIN_NAME,
            'domains' => [
                [
                    'names' => [
                        'fgcom-new' . DOMAIN_POSTFIX,
                        'www.fgcom-new' . DOMAIN_POSTFIX
                    ]
                ],
                [
                    'names' => [
                        'fgru-new' . DOMAIN_POSTFIX,
                        'www.fgru-new' . DOMAIN_POSTFIX
                    ]
                ]
            ],
            'tpl' => NGINX_TPL,
            'tpl_http_to_https' => NGINX_TPL_HTTP_TO_HTTPS
        ],
        [
            'name' => APACHE,
            'file_name' => MAIN_NAME . DOMAIN_POSTFIX . '.conf',
            'domain' => [
                'names' => [
                    'fgcom-new' . DOMAIN_POSTFIX,
                    'www.fgcom-new' . DOMAIN_POSTFIX,
                    'fgru-new' . DOMAIN_POSTFIX,
                    'www.fgru-new' . DOMAIN_POSTFIX
                ]
            ],
            'tpl' => APACHE_TPL
        ]
    ]

];