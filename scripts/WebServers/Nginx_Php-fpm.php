<?php

/**
 * Запуск `sudo php %%path_to%%/Nginx_Php-fpm.php`
 */

$config = [
    //'server_name' => 'market-music.com.ru.web',
    'server_name' => 'gos_sendbox.web',
    'root_path' => '/home/gutsout/h/gos_sendbox',
    //'root_path' => '/home/gutsout/h/pg-mailing-maker',
    //'root_path' => '/home/gutsout/h/market-music.com.ru',
    'php-fpm-name' => 'php7.1-fpm'
];

$nginxFileName = "{$config['server_name']}.conf";

$configText = "
server {
    listen 80;
    server_name {$config['server_name']};
    root {$config['root_path']};

    listen 443 ssl;

    access_log /var/log/nginx/{$config['server_name']}/access.log;
    error_log /var/log/nginx/{$config['server_name']}/error.log;

    ssl_certificate /etc/ssl/cert.crt;
    ssl_certificate_key /etc/ssl/cert.key;

    location / {
        index index.php index.html index.htm;
    }

    location ~ \\.php$ {
        fastcgi_pass unix:/run/php/{$config['php-fpm-name']}.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \\\$document_root\\\$fastcgi_script_name;
        include fastcgi_params;

        #fastcgi_pass 127.0.0.1:9000;
        #add_header Debug-header \\\$document_root\\\$fastcgi_script_name always;
    }

}";


//Удаляем старое...
`rm /etc/nginx/sites-enabled/{$nginxFileName} /etc/nginx/sites-available/{$nginxFileName}`;
`rm -rf /var/log/nginx/{$config['server_name']}`;

//Создаём новое
//nginx
`touch /etc/nginx/sites-available/{$nginxFileName}`;
`ln -s /etc/nginx/sites-available/{$nginxFileName} /etc/nginx/sites-enabled/{$nginxFileName}`;
`echo "{$configText}" >> /etc/nginx/sites-available/{$nginxFileName}`;
`mkdir /var/log/nginx/{$config['server_name']}`;
`/etc/init.d/{$config['php-fpm-name']} restart`;
`/etc/init.d/nginx restart`;
