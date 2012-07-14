<?php

namespace Mongrel\Request;

use \Mongrel\RequestException;

class Headers extends \ArrayObject
{
    /**
     * Create a Mongrel Request Headers Object
     * 
     * @param string $headers
     * @throws RequestException 
     */
    public function __construct( $headers )
    {
        if( !is_string( $headers ) )
        {
            throw new RequestException( 'Failed to parse mongrel request headers' );
        }
        
        $headers = json_decode( $headers );
        
        if( is_array( $headers ) )
        {
            throw new RequestException( 'Invalid JSON format. Failed to parse mongrel request headers' );
        }
        
        parent::__construct( $headers );
    }
}