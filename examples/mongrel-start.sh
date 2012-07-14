#!/bin/bash

SCRIPT=`readlink -f $0`
SCRIPTPATH=`dirname $SCRIPT`

mkdir $SCRIPTPATH/mongrel/run $SCRIPTPATH/mongrel/logs $SCRIPTPATH/mongrel/tmp
chmod 777 -R $SCRIPTPATH/mongrel/run $SCRIPTPATH/mongrel/logs $SCRIPTPATH/mongrel/tmp

m2sh load -config $SCRIPTPATH/mongrel/sites/example.conf

echo "Port opened on localhost:8001"
m2sh start -host localhost