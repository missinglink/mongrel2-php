#!/bin/sh

rm -rf /tmp/mongrel2
git clone git://github.com/zedshaw/mongrel2.git /tmp/mongrel2
cd /tmp/mongrel2

make clean all && sudo make install