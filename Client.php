<?php

namespace Mongrel;

class Client
{
    private $frontend, $backend;
    
    /**
     * Generic client interface for Mongrel2
     * 
     * @param \ZMQContext $context The ZMQ context to use
     * @param string $frontDsn eg. 'tcp://127.0.0.1:9997'
     * @param string $backDsn eg. 'tcp://127.0.0.1:9996'
     */
    public function __construct( \ZMQContext $context, $frontDsn, $backDsn )
    {
        if( !is_string( $frontDsn ) || !is_string( $backDsn ) )
        {
            throw new \InvalidArgumentException( 'Invalid DSN' );
        }
        
        // Listen for requests
        $this->frontend = $context->getSocket( \ZMQ::SOCKET_UPSTREAM, null, null );
        $this->frontend->connect( $frontDsn );

        // Send responses
        $this->backend = $context->getSocket( \ZMQ::SOCKET_PUB, null, null );
        $this->backend->connect( $backDsn );
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
