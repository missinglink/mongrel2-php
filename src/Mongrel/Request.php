<?php

namespace Mongrel;

class Request
{
    const FORMAT = '_^(?<uuid>[a-f0-9\-]{36}) (?<browser>[0-9]+) (?<path>\S+) (?<hsize>[0-9]+):(?<headers>{(.+)}),(?<bsize>[0-9]+):(?<body>.*),$_';
    private $data, $uuid, $browser, $path, $headers, $body;

    /**
     * Create a Mongrel request
     * 
     * @param string $message
     * @throws RequestException 
     */
    public function __construct( $message )
    {
        if( !is_string( $message ) || !preg_match( self::FORMAT, $message, $this->data ) )
        {
            throw new RequestException( 'Invalid format. Failed to parse mongrel request' );
        }
        
        $this->uuid    = new Request\Uuid( $this->data[ 'uuid' ] );
        $this->browser = new Request\Browser( $this->data[ 'browser' ] );
        $this->path    = new Request\Path( $this->data[ 'path' ] );
        $this->headers = new Request\Headers( $this->data[ 'headers' ] );
        $this->body    = new Request\Body( $this->data[ 'body' ] );
    }
    
    /**
     * Get zmq socket uuid
     * 
     * @return Request\Uuid 
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Get mongrel browser id
     * 
     * @return Request\Browser 
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Get URI
     * 
     * @return Request\Path 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get request headers
     * 
     * @return Request\Headers 
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get request body
     * 
     * @return Request\Body
     */
    public function getBody()
    {
        return $this->body;
    }
}