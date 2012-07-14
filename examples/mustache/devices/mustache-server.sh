#!/usr/bin/php
<?php

use \Mongrel\Http;

require_once sprintf( '%s/../../../vendor/autoload.php', __DIR__ );
require_once sprintf( '%s/Mustache.php', __DIR__ );

// Use Mustache view renderer
$mustache = new Mustache( file_get_contents( sprintf( '%s/../views/example1.mustache', __DIR__ ) ) );

// Quick & dirty view renderer using Mustache
$view = function( Http\Request $request ) use ( $mustache )
{
    // We need some info from the original Mongrel request object in this view
    $mongrelRequest = $request->getMongrelRequest();
    
    // Render the view
    return $mustache->render( null, array(
        'title' => 'It\'s Alive!',
        'sections' => array(
            array( 'title' => 'Uuid',    'text' => $mongrelRequest->getUuid() ),
            array( 'title' => 'Browser', 'text' => $mongrelRequest->getBrowser() ),
            array( 'title' => 'Path',    'text' => $mongrelRequest->getPath() ),
            array( 'title' => 'Body',    'text' => $mongrelRequest->getBody() ),
            array( 'title' => 'Headers', 'text' => print_r( $request->getHeaders(), true ) ),
            array( 'title' => 'Query',   'text' => $request->getQuery() ),
        )
    ));
};

// Create a new Mongrel client
$mongrelClient = new \Mongrel\Client(
    new \ZMQContext,
    new \Mongrel\Dsn( 'tcp://127.0.0.1:9997' ),
    new \Mongrel\Dsn( 'tcp://127.0.0.1:9996' )
);

// Create a new Mongrel HTTP client
$client = new Http\Client( $mongrelClient );

while( true )
{
    /* @var $request \Mongrel\Http\Request Listen for requests */
    $request = $client->recv();
    
    /* @var $html string Render HTML using view callback */
    $html = call_user_func( $view, $request );
    
    /* @var $response \Mongrel\Http\Response Build a response */
    $response = new Http\Response( $html, array( 'Content-Type' => 'text/html; charset=UTF-8' ) );
    
    // Send response back to the browser that requested it
    $client->reply( $response, $request );
    
    // Clean up
    unset( $request, $html, $response );
}