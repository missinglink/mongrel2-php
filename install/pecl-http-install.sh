#!/bin/sh

sudo pecl update-channels
sudo pecl install pecl_http

echo "extension=http.so" | sudo tee /etc/php5/conf.d/http.ini

clear
php -i | grep http

echo "Installation Complete"