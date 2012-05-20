<?php

namespace Mongrel\Http;

class Client
{
    private $client;
    
    /**
     * Maps Mongrel request/responses to HTTP request/responses and vice versa
     * 
     * @param \Mongrel\Client $client
     */
    public function __construct( \Mongrel\Client $client )
    {
        // Set the Mongrel client object
        $this->client = $client;
    }

    /**
     * Receives a message
     * 
     * @return Request Returns the HTTP request object.
     */
    public function recv()
    {
        // Wait for a new message from Mongrel
        $request = $this->client->recv();

        // Create a new HTTP request object
        $httpRequest = new Request( $request );
        
        return $httpRequest;
    }
    
    /**
     * Sends a message
     * 
     * @param Response $httpResponse The HTTP response to send.
     * 
     * @return Client Returns the current object.
     */
    public function send( Response $httpResponse, \Mongrel\Request $mongrelRequest )
    {
        // Create the Mongrel response object
        $response = new \Mongrel\Response( $httpResponse->getMessage() );
        $response->replyTo( $mongrelRequest );
        
        // Send message to Mongrel
        return $this->client->send( $response );
    }
}
