#!/bin/sh

SCRIPT=`readlink -f $0`
SCRIPTPATH=`dirname $SCRIPT`

sudo apt-get update
sudo apt-get install -y libtool autoconf automake uuid-dev git-core
sudo apt-get install -y php5-common php5-dev php5-cli php5-uuid
sudo apt-get install -y libmagic1 libmagic-dev
sudo apt-get install -y curl libcurl3 libcurl3-openssl-dev

# Store PHP INI Path
PHP_INI_PATH=$(php --ini | grep "Scan for additional" | sed -e "s|.*:\s*||")

# Installing ØMQ 2.2
cd /tmp
rm -rf libzmq
git clone https://github.com/zeromq/zeromq2-x.git libzmq
cd libzmq
git pull origin master
./autogen.sh
./configure
make
sudo make install

# Installing ØMQ PHP Module
cd /tmp
git clone git://github.com/mkoppanen/php-zmq.git
cd php-zmq
git pull origin master
phpize
./configure
make
sudo make install
echo "extension=zmq.so" | sudo tee $PHP_INI_PATH/zmq.ini

# Installing pecl_http Module
printf "\n\n\n\n" | sudo pecl install pecl_http
echo "extension=http.so" | sudo tee $PHP_INI_PATH/http.ini

# Installing Composer
cd $SCRIPTPATH/../
curl -s http://getcomposer.org/installer | php
php composer.phar install