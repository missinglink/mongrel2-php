#!/bin/sh

# BASEDIR=$(dirname $0)

mkdir mongrel/run mongrel/logs mongrel/tmp
chmod 777 -R mongrel/run mongrel/logs mongrel/tmp

m2sh load -config mongrel/sites/example.conf

cowsay "Port opened on localhost:8001"
m2sh start -host localhost