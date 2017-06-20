<?php
const NGINX = 'nginx';
const APACHE = 'apache2';

const DOMAIN_POSTFIX = '.ryaroma.web';
const MAIN_NAME = 'ru-forums';
//const DOCUMENT_ROOT = '/home/gutsout/h/texode';
const DOCUMENT_ROOT = '/home/gutsout/h/forums-ru';

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
    'document_root' => DOCUMENT_ROOT,
    'main_name' => MAIN_NAME,
    'servers' => [
        [
            'name' => NGINX,
            'file_name' => MAIN_NAME,
            'domains' => [
                /*[
                    'names' => [
                        'texode' . DOMAIN_POSTFIX,
                        'www.texode' . DOMAIN_POSTFIX
                    ]
                ],*/
                /*[
                    'names' => [
                        'securenews' . DOMAIN_POSTFIX,
                        'www.securenews' . DOMAIN_POSTFIX
                    ]
                ],*/
                /*[
                    'names' => [
                        'profiz' . DOMAIN_POSTFIX,
                        'www.profiz' . DOMAIN_POSTFIX
                    ]
                ],*/
                /*[
                    'names' => [
                        'zp' . DOMAIN_POSTFIX,
                        'www.zp' . DOMAIN_POSTFIX
                    ]
                ],
                [
                    'names' => [
                        'peo' . DOMAIN_POSTFIX,
                        'www.peo' . DOMAIN_POSTFIX
                    ]
                ],
                [
                    'names' => [
                        'eco' . DOMAIN_POSTFIX,
                        'www.eco' . DOMAIN_POSTFIX
                    ]
                ],*/
                [
                    'names' => [
                        'sekretar-info' . DOMAIN_POSTFIX,
                        'buhgalter-info' . DOMAIN_POSTFIX,
                        'kadrovik-info' . DOMAIN_POSTFIX,
                        'economist-info' . DOMAIN_POSTFIX,
                        'ecolog-info' . DOMAIN_POSTFIX,
                    ]
                ],
            ],
            'tpl' => NGINX_TPL,
            'tpl_http_to_https' => NGINX_TPL_HTTP_TO_HTTPS
        ],
        [
            'name' => APACHE,
            'file_name' => MAIN_NAME . DOMAIN_POSTFIX . '.conf',
            'domain' => [
                'names' => [
                    /*'texode' . DOMAIN_POSTFIX,
                    'www.texode' . DOMAIN_POSTFIX,*/
                    /*'profiz' . DOMAIN_POSTFIX,
                    'www.profiz' . DOMAIN_POSTFIX,*/
                    /*'zp' . DOMAIN_POSTFIX,
                    'www.zp' . DOMAIN_POSTFIX,
                    'peo' . DOMAIN_POSTFIX,
                    'www.peo' . DOMAIN_POSTFIX,
                    'eco' . DOMAIN_POSTFIX,
                    'www.eco' . DOMAIN_POSTFIX,*/
                    //'fgru-new' . DOMAIN_POSTFIX,
                    //'www.fgru-new' . DOMAIN_POSTFIX
                    'sekretar-info' . DOMAIN_POSTFIX,
                    'buhgalter-info' . DOMAIN_POSTFIX,
                    'kadrovik-info' . DOMAIN_POSTFIX,
                    'economist-info' . DOMAIN_POSTFIX,
                    'ecolog-info' . DOMAIN_POSTFIX,
                ]
            ],
            'tpl' => APACHE_TPL
        ]
    ]

];