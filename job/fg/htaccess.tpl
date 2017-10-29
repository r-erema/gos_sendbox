RewriteEngine On
RewriteBase /

#robots.txt
RewriteCond %{HTTP_HOST} ^%%domain_ru_regexp%% [NC]
RewriteCond %{REQUEST_URI} ^/robots.txt
RewriteRule ^.*$ /robots.ru.txt [L,QSA]

RewriteCond %{HTTP_HOST} ^%%domain_com_regexp%% [NC]
RewriteCond %{REQUEST_URI} ^/robots.txt
RewriteRule ^.*$ /robots.com.txt [L,QSA]


#Добавляем слэш в конец#
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_URI} !(.*)/$
RewriteCond %{REQUEST_URI} !\.html$
RewriteRule ^(.*[^/])$ $1/ [L,R=301]

#### www.fg.com -> fg.com ####
RewriteCond %{HTTP_HOST} www\.%%domain_com_regexp%% [NC]  #todo: Change on prod
RewriteRule (.*) https://%%domain_com%%/$1 [R=301,L] #todo: Change on prod

RewriteCond %{HTTP_HOST} www\.%%domain_ru_regexp%% [NC]  #todo: Change on prod
RewriteRule (.*) https://%%domain_ru%%/$1 [R=301,L] #todo: Change on prod

# Download Center
RewriteRule ^download/(.*)$ /dc/$1 [L]

##### Редирект со ссылок старого сайта ##############
#.ru
RewriteCond %{REQUEST_URI} ^/pressroom/news/(.*)$
RewriteRule ^pressroom/news/(.*)$ /pressroom/publications/news/$1 [R=301,L]

RewriteCond %{REQUEST_URI} ^/pressroom/articles/(.*)$
RewriteRule ^pressroom/articles/(.*)$ /pressroom/publications/articles/$1 [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/full-control-over-user-work-stations.html$
RewriteRule ^.*$ /product/functions/ [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/information-security.html$
RewriteRule ^.*$ /product/functions/ [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/opportunities.html$
RewriteRule ^.*$ /product/capabilities/ [R=301,L]

#.com
RewriteCond %{REQUEST_URI} ^/about/news/(.*)
RewriteRule ^about/news/(.*)$ /pressroom/publications/news/$1 [R=301,L]

RewriteCond %{REQUEST_URI} ^/articles/(.*)
RewriteRule ^articles/(.*)$ /pressroom/publications/articles/$1 [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/control-of-work-processes.html$
RewriteRule ^.*$ /product/functions/ [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/features.html$
RewriteRule ^.*$ /product/capabilities/ [R=301,L]

#.ru &.com
RewriteCond %{REQUEST_URI} ^/researches/(.*)$
RewriteRule ^researches/(.*)$ /pressroom/publications/research/$1 [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/$
RewriteRule ^.*$ / [R=301,L]

RewriteCond %{REQUEST_URI} ^/about/$
RewriteRule ^.*$ /company/about/ [R=301,L]

RewriteCond %{REQUEST_URI} ^/contacts/$
RewriteRule ^.*$ /company/contacts/ [R=301,L]

RewriteCond %{REQUEST_URI} ^/researches.html$
RewriteRule ^.*$ /pressroom/publications/research/ [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/presentaion.html$
RewriteRule ^.*$ /presentation.html [R=301,L]

RewriteCond %{REQUEST_URI} ^/products/secure-tower/download.html$
RewriteRule ^.*$ /download.html [R=301,L]

RewriteCond %{REQUEST_URI} ^/contacts/support.html$
RewriteRule ^.*$ /support.html [R=301,L]

RewriteCond %{REQUEST_URI} ^/contacts/support.php/$
RewriteRule ^.*$ /support.html [R=301,L]
################################################################

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{HTTP_HOST} ^%%domain_com_regexp%% [NC] #todo: Change on prod
RewriteRule ^(pl|zh|es|ar)//?(.*)$ index.php?cultureKey=$1&q=$2 [L,QSA]

####################################################################
RewriteCond %{HTTP_HOST} ^%%domain_com_regexp%% [NC] #todo: Change on prod
RewriteCond %{REQUEST_URI} ^/index.php
RewriteRule ^index\.php$ index.php?cultureKey=en [L,QSA]
####################################################################

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{HTTP_HOST} ^%%domain_com_regexp%% [NC] #todo: Change on prod
RewriteRule ^(.*)$ index.php?cultureKey=en&q=$1 [L,QSA]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]

#Debugging
#RewriteCond %{QUERY_STRING} !QSdump
#RewriteRule (.*) ?QSdump=%{REQUEST_URI}&h=%{HTTP_HOST}&r=%{REQUEST_FILENAME} [R=302,L,QSA]