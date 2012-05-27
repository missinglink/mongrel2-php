<?php

namespace Mongrel;

class Client
{
    private $frontend, $backend;
    
    /**
     * Generic client interface for Mongrel2
     * 
     * @param \ZMQContext $context
     * @param Dsn $frontDsn
     * @param Dsn $backDsn
     */
    public function __construct( \ZMQContext $context, Dsn $front, Dsn $back )
    {
        // Listen for requests
        $this->frontend = $context->getSocket( \ZMQ::SOCKET_UPSTREAM, null );
        $this->frontend->connect( $front->toString() );

        // Send responses
        $this->backend = $context->getSocket( \ZMQ::SOCKET_PUB, null );
        $this->backend->connect( $back->toString() );
    }

    /**
     * Receives a message
     * 
     * Receive a message from Mongrel. By default receiving will block.
     * 
     * @return \Mongrel\Request Returns the Mongrel request.
     */
    public function recv()
    {
        return new \Mongrel\Request( $this->frontend->recv() );
    }
    
    /**
     * Sends a message
     * 
     * Send a message to Mongrel.
     * 
     * @param \Mongrel\Response $response The Mongrel response to send.
     * 
     * @return \Mongrel\Client Returns the current object.
     */
    public function send( \Mongrel\Response $response )
    {
        $this->backend->send( $response->getMessage() );
        
        return $this;
    }
}
