<?php

namespace Mongrel\Http;

class Request
{
    private $mongrelRequest;
    private $headers, $query;
    
    /**
     * Create an HTTP request
     * 
     * @param \Mongrel\Request $request
     */
    public function __construct( \Mongrel\Request $request )
    {
        $this->mongrelRequest = $request;
        $this->headers = new Headers( $this->mongrelRequest->getHeaders() );
        $this->query = new \HttpQueryString( false );
        
        if( $this->headers->offsetExists( 'QUERY' ) )
        {
            $this->query->set( $this->headers->offsetGet( 'QUERY' ) );
        }
    }
    
    /**
     * Get Mongrel request object
     * 
     * @return \Mongrel\Request
     */
    public function getMongrelRequest()
    {
        return $this->mongrelRequest;
    }
    
    /**
     * Get request headers
     * 
     * @return \Mongrel\Http\Headers 
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    
    /**
     * Get request query string object
     * 
     * @return \HttpQueryString 
     */
    public function getQuery()
    {
        return $this->query;
    }
}