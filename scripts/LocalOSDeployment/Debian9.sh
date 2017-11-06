#!/usr/bin/env bash

#Config
ideDir=ide;
userDir=/home/gutsout;

echo "Enter PHPSTORM version to download";
read phpstormVersion;

phpStormArchive=PhpStorm-${phpstormVersion}.tar.gz

cd ${userDir};

#gdebi
apt-get install gdebi -y;

#Sudo
apt-get install sudo -y;

#Google Chrome
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb;
gdebi google-chrome-stable_current_amd64.deb;
rm google-chrome-stable_current_amd64.deb;

#Nginx
apt-get install nginx -y;

#PHP7.1
sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg;
sudo sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list';
sudo apt update;
sudo apt install php7.1-common  php7.1-readline php7.1-fpm php7.1-cli php7.1-gd php7.1-mysql php7.1-mcrypt php7.1-curl php7.1-mbstring php7.1-opcache php7.1-json;

#Git
apt-get install git;

#Make dir 'ide'
mkdir ${ideDir};

#PHPSTORM
sudo wget -O ${ideDir} https://download-cf.jetbrains.com/webide/${phpStormArchive}
tar xfz ${ideDir}/${phpStormArchive} -C ${ideDir}
rm ${phpStormArchive}
export PhpStormDir="$(find ${ideDir} -type d -name "PhpStorm-*")"
sudo wget -O ${ideDir} https://github.com/zheludkovm/LinuxJavaFixes/archive/master.zip
zip -r master.zip ${ideDir}
echo "${userDir}/${ideDir}/LinuxJavaFixes-master/build/LinuxJavaFixes-1.0.0-SNAPSHOT.jar" >> ${userDir}/${PhpStormDir}/bin/phpstorm64.vmoptions
