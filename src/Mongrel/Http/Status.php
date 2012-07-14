<?php

namespace Mongrel\Http;

use \Mongrel\ResponseException;

class Status
{
    const FORMAT = '_^(?<code>[0-9]{3}) (?<status>.+)$_';
    private $status;
    
    /**
     * Create an HTTP Response Body Object
     * 
     * @param string $status
     * @throws RequestException 
     */
    public function __construct( $status )
    {
        if( !is_string( $status ) || !preg_match( self::FORMAT, $status ) )
        {
            throw new ResponseException( 'Invalid response status line' );
        }
        
        $this->status = $status;
    }
    
    /**
     * Get HTTP Response Body
     * 
     * @return string 
     */
    public function __toString()
    {
        return (string) $this->status;
    }
}