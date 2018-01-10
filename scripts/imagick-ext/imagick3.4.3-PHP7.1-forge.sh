#!/bin/bash
if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  exit
fi

apt-get install pkg-config libmagickwand-dev -y
cd /tmp
wget https://pecl.php.net/get/imagick-3.4.3.tgz
tar xvzf imagick-3.4.3.tgz
cd imagick-3.4.3
phpize
autoreconf --force --install
./configure
make install
rm -rf /tmp/imagick-3.4.3*
echo extension=imagick.so >> /etc/php/7.1/cli/php.ini
echo extension=imagick.so >> /etc/php/7.1/fpm/php.ini
service php7.1-fpm restart
service nginx restart
