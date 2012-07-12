<?php

namespace Mongrel\Request;

use \Mongrel\RequestException;

class Browser
{
    private $id;
    
    /**
     * Create a Mongrel Browser Object
     * 
     * @param numeric $browserId
     * @throws RequestException 
     */
    public function __construct( $browserId )
    {
        if( !is_numeric( $browserId ) )
        {
            throw new RequestException( 'Invalid format. Failed to parse mongrel browser id' );
        }
        
        $this->id = $browserId;
    }
    
    /**
     * Get Mongrel Browser Id
     * 
     * @return int 
     */
    public function __toString()
    {
        return (string) $this->id;
    }
}