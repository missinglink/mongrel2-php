#!/bin/sh

sudo apt-get update
sudo apt-get install -y libtool autoconf automake uuid-dev git-core

cd /tmp
rm -rf libzmq
git clone https://github.com/zeromq/zeromq2-x.git libzmq
cd libzmq
git pull origin master
./autogen.sh
./configure
make
sudo make install

clear
dpkg -l | grep zmq

echo "Installation Complete"