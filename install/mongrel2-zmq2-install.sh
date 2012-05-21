#!/bin/sh

sudo apt-get update
sudo apt-get install -y libtool autoconf automake uuid-dev git-core sqlite3 libsqlite3*

rm -rf /tmp/mongrel2
git clone git://github.com/zedshaw/mongrel2.git /tmp/mongrel2
cd /tmp/mongrel2

make clean all && sudo make install

echo "Installation Complete"