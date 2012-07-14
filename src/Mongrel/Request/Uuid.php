<?php

namespace Mongrel\Request;

use \Mongrel\RequestException;

class Uuid
{
    const FORMAT = '_^(?<uuid>[a-f0-9\-]{36})$_';
    private $uuid;
    
    /**
     * Create a Mongrel Uuid Object
     * 
     * @param string $uuid
     * @throws RequestException 
     */
    public function __construct( $uuid )
    {
        if( !preg_match( self::FORMAT, $uuid ) )
        {
            throw new RequestException( 'Invalid format. Failed to parse mongrel uuid' );
        }
        
        $this->uuid = $uuid;
    }
    
    /**
     * Get zmq socket uuid
     * 
     * @return string 
     */
    public function __toString()
    {
        return (string) $this->uuid;
    }
}