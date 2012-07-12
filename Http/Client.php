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
        $this->client = $client;
    }

    /**
     * Receives a message
     * 
     * @return Mongrel\Http\Request Returns the HTTP request object.
     */
    public function recv()
    {
        // Wait for a new message from Mongrel
        $request = $this->client->recv();

        return new Request( $request );
    }
    
    /**
     * Reply to the sender of a request
     * 
     * @param Mongrel\Http\Response $httpResponse The HTTP response to send.
     * @param Mongrel\Http\Request $httpRequest The HTTP request to reply to.
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
     * @param Mongrel\Http\Response $httpResponse The HTTP response to send.
     * @param Mongrel\Request\Uuid $uuid The Zmq uuid to send the message to.
     * @param Mongrel\Request\Browser $browser The browser to send the message to.
     * 
     * @return Client Returns the current object.
     */
    public function send( Response $httpResponse, Uuid $uuid, Browser $browser )
    {
        $browsers = new BrowserStack;
        $browsers->attach( $browser );
        
        return $this->sendMulti( $httpResponse, $uuid, $browsers );
    }
    
    /**
     * Sends a message to multiple browsers simultaneously
     * 
     * @param Mongrel\Http\Response $httpResponse The HTTP response to send.
     * @param Mongrel\Request\Uuid $uuid The Zmq uuid to send the message to.
     * @param Mongrel\Request\BrowserStack $browsers The browsers to send the message to.
     * 
     * @return Client Returns the current object.
     */
    public function sendMulti( Response $httpResponse, Uuid $uuid, BrowserStack $browsers )
    {
        $response = new \Mongrel\Response( $uuid, $browsers );
        $response->setBody( $httpResponse->getMessage() );
        
        return $this->client->send( $response );
    }
}
