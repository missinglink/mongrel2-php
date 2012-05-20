#!/usr/bin/php
<?php

require_once sprintf( '%s/../../autoloader.php', __DIR__ );
require_once sprintf( '%s/Mustache.php', __DIR__ );

// Use Mustache view renderer
$mustache = new Mustache( file_get_contents( sprintf( '%s/../views/example1.mustache', __DIR__ ) ) );

// Quick & dirty view renderer using Mustache
$view = function( \Mongrel\Http\Request $request ) use ( $mustache )
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

// Create a new Mongrel HTTP client
$client = new \Mongrel\Http\Client( new \Mongrel\Client( new \ZMQContext, 'tcp://127.0.0.1:9997', 'tcp://127.0.0.1:9996' ) );

while( true )
{
    /* @var $request \Mongrel\Http\Request Listen for requests */
    $request = $client->recv();
    
    /* @var $html string Render HTML using view callback */
    $html = call_user_func( $view, $request );
    
    /* @var $response \Mongrel\Http\Response Build a response */
    $response = new \Mongrel\Http\Response( $html, array( 'Content-Type' => 'text/html; charset=UTF-8' ) );
    
    // Send reply
    $client->send( $response, $request->getMongrelRequest() );
    
    // Clean up
    unset( $request, $html, $response );
}