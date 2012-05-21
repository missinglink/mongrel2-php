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

Simple Client Example

    // Create a new Mongrel client
    $mongrelClient = new \Mongrel\Client( new \ZMQContext, 'tcp://127.0.0.1:9997', 'tcp://127.0.0.1:9996' )
    
    // Create a new Mongrel HTTP client
    $client = new \Mongrel\Http\Client( $mongrelClient );
    
    // Listen for requests
    while( true )
    {
        /* @var $request \Mongrel\Http\Request */
        $request = $client->recv();
        
        // Build a response
        $response = new \Mongrel\Http\Response( '<h1>Hello World!</h1>, array( 'Content-Type' => 'text/html' ) );
        
        // Send reply
        $client->send( $response, $request->getMongrelRequest() );
        
        // Clean up
        unset( $request, $response );
    }

Mustache View Renderer Example
--------

    cd ./examples
    ./mongrel-start.sh
    ./mustache/devices/mustache-server.sh (in another window)

Open http://localhost:8001/ in your web browser

Tests
--------

    phpunit -c test/phpunit.xml --coverage-html test/coverage .

Travis CI
---------

![travis-ci](http://cdn-ak.favicon.st-hatena.com/?url=http%3A%2F%2Fabout.travis-ci.org%2F)&nbsp;http://travis-ci.org/#!/missinglink/mongrel2-php

![travis-ci](https://secure.travis-ci.org/missinglink/mongrel2-php.png?branch=master)

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