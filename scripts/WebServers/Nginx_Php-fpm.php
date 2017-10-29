<?php

/**
 * Запуск `sudo php %%path_to%%/Nginx_Php-fpm.php`
 */

$config = [
    'server_name' => 'gutsout.web',
    'root_path' => '/home/gutsout/h/gos_sendbox',
    //'root_path' => '/home/gutsout/h/public-games/public',
    'php-fpm-name' => 'php7.2-fpm'
];

$nginxFileName = $config['server_name'];

$configText = "
server {
    listen 80;
    server_name {$config['server_name']};
    root {$config['root_path']};

    access_log /var/log/nginx/{$nginxFileName}/access.log;
    error_log /var/log/nginx/{$nginxFileName}/error.log;

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

    location /phpmyadmin {
           root /usr/share/;
           index index.php index.html index.htm;
           location ~ ^/phpmyadmin/(.+\.php)$ {
                   try_files \\\$uri =404;
                   root /usr/share/;
                   fastcgi_pass unix:/run/php/php7.1-fpm.sock;
                   fastcgi_index index.php;
                   fastcgi_param SCRIPT_FILENAME \\\$document_root\\\$fastcgi_script_name;
                   include /etc/nginx/fastcgi_params;
           }
           location ~* ^/phpmyadmin/(.+\.(jpg|jpeg|gif|css|png|js|ico|html|xml|txt))$ {
                   root /usr/share/;
           }
    }

}";


//Удаляем старое...
`rm /etc/nginx/sites-enabled/{$nginxFileName} /etc/nginx/sites-available/{$nginxFileName}`;
`rm -rf /var/log/nginx/{$nginxFileName}`;

//Создаём новое
//nginx
`touch /etc/nginx/sites-available/{$nginxFileName}`;
`ln -s /etc/nginx/sites-available/{$nginxFileName} /etc/nginx/sites-enabled/{$nginxFileName}`;
`echo "{$configText}" >> /etc/nginx/sites-available/{$nginxFileName}`;
`mkdir /var/log/nginx/{$nginxFileName}`;
`service {$config['php-fpm-name']} reload`;
`service nginx reload`;