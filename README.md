Simple library for writing Mongrel2 clients in PHP 5.3+ using zeromq 2.2
========================================================================

Install
--------

    cd ./install
    sudo ./zmq22-install.sh
    sudo ./zmqphp-install.sh
    ./zmq-version.sh
    sudo ./mongrel2-zmq2-install.sh
    sudo ./pecl-http-install.sh

Example
--------

    cd ./examples
    ./mongrel-start.sh
    ./mustache/devices/mustache-server.sh (in another window)

Open http://localhost:8001/ in your web browser

Tests
--------

    phpunit -c test/phpunit.xml --coverage-html test/coverage .

![travis-ci](http://cdn-ak.favicon.st-hatena.com/?url=http%3A%2F%2Fabout.travis-ci.org%2F) ![travis-ci](https://secure.travis-ci.org/missinglink/mongrel2-php.png?branch=master)

License
------------------------

Released under the MIT(Poetic) Software license

    This work 'as-is' we provide.
    No warranty express or implied.
    Therefore, no claim on us will abide.
    Liability for damages denied.

    Permission is granted hereby,
    to copy, share, and modify.
    Use as is fit,
    free or for profit.
    These rights, on this notice, rely.