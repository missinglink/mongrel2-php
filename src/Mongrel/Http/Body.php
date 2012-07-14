<?php

namespace Mongrel\Http;

use \Mongrel\ResponseException;

class Body
{
    private $body;
    
    /**
     * Create an HTTP Response Body Object
     * 
     * @param string $body
     * @throws RequestException 
     */
    public function __construct( $body )
    {
        if( !is_string( $body ) )
        {
            throw new ResponseException( 'Invalid response body' );
        }
        
        $this->body = $body;
    }
    
    /**
     * Get HTTP Response Body
     * 
     * @return string 
     */
    public function __toString()
    {
        return (string) $this->body;
    }
}