<?php

namespace Mongrel;

use \Mongrel\Request,
    \Mongrel\ResponseException;

class Response
{
    private $uuid, $browsers, $body;
    
    /**
     * Create a Mongrel response
     * 
     * @param Request\Uuid $uuid
     * @param Request\BrowserStack $browsers
     */
    public function __construct( Request\Uuid $uuid, Request\BrowserStack $browsers )
    {
        $this->uuid     = $uuid;
        $this->browsers = $browsers;
    }
    
    /**
     * Render response in Mongrel format
     * 
     * @return string 
     */
    public function getMessage()
    {
        return sprintf( '%s %d:%s, %s', $this->uuid, strlen( $this->browsers ), $this->browsers, $this->body );
    }
    
    /**
     * Set response body
     * 
     * @param string $body 
     */
    public function setBody( $body )
    {
        if( !is_string( $body ) )
        {
            throw new ResponseException( 'Invalid format. Response body must be a string' );
        }
        
        $this->body = $body;
    }
}