<?php

namespace Mongrel\Http;

use \Mongrel\ResponseException;

class Protocol
{
    const FORMAT = '_^HTTP\/(?<version>1\.[01])$_';
    private $protocol;
    
    /**
     * Create an HTTP Response Body Object
     * 
     * @param string $protocol
     * @throws RequestException 
     */
    public function __construct( $protocol )
    {
        if( !preg_match( self::FORMAT, $protocol ) )
        {
            throw new RequestException( 'Invalid response protocol' );
        }
        
        $this->protocol = $protocol;
    }
    
    /**
     * Get HTTP Response Body
     * 
     * @return string 
     */
    public function __toString()
    {
        return (string) $this->protocol;
    }
}