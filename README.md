PHP library for Mongrel2

Install
--------

    cd ./install
    ./zmq22-install.sh
    ./zmqphp-install.sh
    ./zmq-version.sh
    ./mongrel2-zmq2-install.sh

Example
--------

    cd ./examples
    ./mongrel-start.sh
    ./mustache/devices/mustache-server.sh (in another window)

Open http://localhost:8001/ in your web browser

Tests
--------

    phpunit -c test/phpunit.xml --coverage-html test/coverage .

License
------------------------

Insomnia is released under the MIT(Poetic) Software license

    This work 'as-is' we provide.
    No warranty express or implied.
    Therefore, no claim on us will abide.
    Liability for damages denied.

    Permission is granted hereby,
    to copy, share, and modify.
    Use as is fit,
    free or for profit.
    These rights, on this notice, rely.