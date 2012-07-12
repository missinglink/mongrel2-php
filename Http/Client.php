<?php

namespace Mongrel\Http;

use \Mongrel\Request\Uuid,
    \Mongrel\Request\Browser,
    \Mongrel\Request\BrowserStack;

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
        return new Request( $request );
    }
    
    /**
     * Reply to the sender of a request
     * 
     * @param Response $httpResponse The HTTP response to send.
     * @param Request $httpRequest The HTTP request to reply to.
     * 
     * @return Client Returns the current object.
     */
    public function reply( Response $httpResponse, Request $httpRequest )
    {
        return $this->send(
            $httpResponse,
            $httpRequest->getMongrelRequest()->getUuid(),
            $httpRequest->getMongrelRequest()->getBrowser()
        );
    }
    
    /**
     * Sends a message
     * 
     * @param Response $httpResponse The HTTP response to send.
     * @param Uuid $uuid The Zmq uuid to send the message to.
     * @param Browser $browser The browser to send the message to.
     * 
     * @return Client Returns the current object.
     */
    public function send( Response $httpResponse, Uuid $uuid, Browser $browser )
    {
        // Create the Mongrel response object
        $response = new \Mongrel\Response( $uuid, new BrowserStack( $browser ) );
        $response->setBody( $httpResponse->getMessage() );
        
        // Send message to Mongrel
        return $this->client->send( $response );
    }
    
    /**
     * Sends a message to multiple browsers simultaneously
     * 
     * @param Response $httpResponse The HTTP response to send.
     * @param Uuid $uuid The Zmq uuid to send the message to.
     * @param BrowserStack $browsers The browsers to send the message to.
     * 
     * @return Client Returns the current object.
     */
    public function sendMulti( Response $httpResponse, Uuid $uuid, BrowserStack $browsers )
    {
        // Create the Mongrel response object
        $response = new \Mongrel\Response( $uuid, $browsers );
        $response->setBody( $httpResponse->getMessage() );
        
        // Send message to Mongrel
        return $this->client->send( $response );
    }
}
