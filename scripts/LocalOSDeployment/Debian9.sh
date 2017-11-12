#!/usr/bin/env bash

#Config
user=gutsout
ideDir=ide;
userDir=/home/${user};
#WARNING!!! Need to wright driver for specific video card.
nvidiaDriverName=nvidia-legacy-340xx-driver;
#Install apps for home, media server, etc.
homeEditionFlag=1;

cd ${userDir};

#Add user to sudoers
echo "${user}    ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

echo "Enter PHPSTORM version to download:";
read phpstormVersion;
phpStormArchive=PhpStorm-${phpstormVersion}.tar.gz

#Configure bash
echo "force_color_prompt=yes" >> ${userDir}/.bashrc;
echo "PS1='\${debian_chroot:+(\$debian_chroot)}\[\033[01;31m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ '" >> /root/.bashrc;
echo "force_color_prompt=yes" >> /root/.bashrc;

#sudo
apt-get install sudo -y;

#apt-transport-https
apt-get install apt-transport-https -y;

#htop
apt-get install htop -y;

#aptitude
apt-get install aptitude -y;

#gdebi
apt-get install gdebi -y;

#zip
apt-get install zip -y;

#net-tools
apt-get install net-tools -y;

#gparted
apt-get install gparted -y;

#Google Chrome
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb;
gdebi google-chrome-stable_current_amd64.deb;
rm google-chrome-stable_current_amd64.deb;

#Nginx
apt-get install nginx -y;

#PHP7.1
wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg;
sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list';
apt update;
apt install php7.1-common php7.1-readline php7.1-fpm php7.1-cli  php7.1-mysql php7.1-mcrypt php7.1-curl php7.1-mbstring php7.1-opcache php7.1-json php7.1-mysql php7.1-xml php7.1-zip php-xdebug -y;
echo 'xdebug.remote_autostart=1' >> /etc/php/7.1/mods-available/xdebug.ini;
echo 'xdebug.remote_enable=1' >> /etc/php/7.1/mods-available/xdebug.ini;
echo 'xdebug.remote_connect_back=1' >> /etc/php/7.1/mods-available/xdebug.ini;
echo 'xdebug.remote_handler="dbgp"' >> /etc/php/7.1/mods-available/xdebug.ini;
echo 'xdebug.remote_host="localhost"' >> /etc/php/7.1/mods-available/xdebug.ini;
echo 'xdebug.remote_port=9000' >> /etc/php/7.1/mods-available/xdebug.ini;
echo 'xdebug.idekey="PHPSTORM"' >> /etc/php/7.1/mods-available/xdebug.ini;

#MySql
apt install mysql-server mysql-client -y;

#phpmyadmin
apt install phpmyadmin -y;

#Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"

#Git
apt-get install git -y;

#Make dir 'ide'
runuser -l ${user} -c "mkdir ${ideDir}";

#PHPSTORM
runuser -l ${user} -c "wget -P ${ideDir} https://download-cf.jetbrains.com/webide/${phpStormArchive}";
runuser -l ${user} -c "tar xfz ${ideDir}/${phpStormArchive} -C ${ideDir}";
rm ${ideDir}/${phpStormArchive};
export PhpStormDir="$(find ${ideDir} -type d -name 'PhpStorm-*')";
runuser -l ${user} -c "wget -P ${ideDir} https://github.com/zheludkovm/LinuxJavaFixes/archive/master.zip";
runuser -l ${user} -c "unzip ${ideDir}/master.zip -d ${ideDir}";
rm ${ideDir}/master.zip;
runuser -l ${user} -c "echo '-javaagent:${userDir}/${ideDir}/LinuxJavaFixes-master/build/LinuxJavaFixes-1.0.0-SNAPSHOT.jar' >> ${userDir}/${PhpStormDir}/bin/phpstorm64.vmoptions";

#Sublime
wget -qO - https://download.sublimetext.com/sublimehq-pub.gpg | apt-key add -
echo "deb https://download.sublimetext.com/ apt/stable/" | tee /etc/apt/sources.list.d/sublime-text.list
sudo apt-get update
sudo apt-get install sublime-text

#Virtualbox
wget http://download.virtualbox.org/virtualbox/5.2.0/virtualbox-5.2_5.2.0-118431~Debian~stretch_amd64.deb;
gdebi virtualbox-5.2_5.2.0-118431~Debian~stretch_amd64.deb;
rm virtualbox-5.2_5.2.0-118431~Debian~stretch_amd64.deb;

#VLC
add-apt-repository ppa:videolan/stable-daily -y;
apt-get update;
apt-get install vlc -y;

#Nvidia drivers
echo "deb http://ftp.us.debian.org/debian/ stretch main contrib non-free" >> /etc/apt/sources.list;
apt update;
apt install linux-headers-$(uname -r|sed 's/[^-]*-[^-]*-//') ${nvidiaDriverName} -y;

if [ ${homeEditionFlag} -eq 1 ] ; then

    #LinuxDC++
    #
    #In client:
    #
    #Hub settings:
    #Encoding: CP1251(Cyrillic)
    #
    #Preferences:
    #Connection:
    #Manual port forwarding: 1
    #Public IP Address: example 10.70.8.144 or https://flynet.by/ip.php
    #TCP: 3559
    #UDP: 3559
    #TLS: 2005
    #
    apt install linuxdcpp -y;

    #Plex media server
    wget https://downloads.plex.tv/plex-media-server/1.8.4.4249-3497d6779/plexmediaserver_1.8.4.4249-3497d6779_amd64.deb;
    gdebi plexmediaserver_1.8.4.4249-3497d6779_amd64.deb;
    rm plexmediaserver_1.8.4.4249-3497d6779_amd64.deb;

fi