#!/bin/sh

sudo apt-get update
sudo apt-get install -y git-core php5-common php5-dev php5-cli php5-uuid

cd /tmp
git clone git://github.com/mkoppanen/php-zmq.git
cd php-zmq
git pull origin master

phpize
./configure
make
sudo make install

echo "extension=zmq.so" | sudo tee /etc/php5/conf.d/zmq.ini

clear
php -i | grep zmq

echo "Installation Complete"
echo "The Imagick extension for PHP can provide segmentation faults on some systems"
echo "Optionally remove imagick with: sudo apt-get remove php5-imagick