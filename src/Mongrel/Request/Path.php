<?php

namespace Mongrel\Request;

use \Mongrel\RequestException;

class Path
{
    private $path;
    
    /**
     * Create a Mongrel Path Object
     * 
     * @param string $path
     * @throws RequestException 
     */
    public function __construct( $path )
    {
        if( !is_string( $path ) )
        {
            throw new RequestException( 'Invalid format. Failed to parse mongrel request path' );
        }
        
        $this->path = $path;
    }
    
    /**
     * Get Mongrel Request Path
     * 
     * @return string 
     */
    public function __toString()
    {
        return $this->path;
    }
}