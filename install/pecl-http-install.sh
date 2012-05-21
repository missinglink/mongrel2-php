#!/bin/sh

sudo apt-get update
sudo apt-get install -y php5-dev libcurl3 libmagic1 libmagic-dev

sudo pecl update-channels
sudo pecl install pecl_http

echo "extension=http.so" | sudo tee /etc/php5/conf.d/http.ini

clear
php -i | grep HTTP

echo "Installation Complete"