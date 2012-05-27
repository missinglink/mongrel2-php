#!/bin/sh

sudo apt-get update
sudo apt-get install -y php5-dev libmagic1 libmagic-dev curl libcurl3 libcurl3-openssl-dev

#sudo pecl update-channels
sudo pecl install pecl_http

echo "extension=http.so" | sudo tee /etc/php5/conf.d/http.ini

clear
php -i | grep HTTP

echo "Installation Complete"