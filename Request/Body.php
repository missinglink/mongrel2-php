<?php

namespace Mongrel\Request;

use \Mongrel\RequestException;

class Body
{
    private $body;
    
    /**
     * Create a Mongrel Request Body Object
     * 
     * @param string $body
     * @throws RequestException 
     */
    public function __construct( $body )
    {
        if( !is_string( $body ) )
        {
            throw new RequestException( 'Invalid format. Failed to parse mongrel request body' );
        }
        
        $this->body = $body;
    }
    
    /**
     * Get Mongrel Request Body
     * 
     * @return string 
     */
    public function __toString()
    {
        return (string) $this->body;
    }
}