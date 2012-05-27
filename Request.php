<?php

namespace Mongrel;

class Request
{
    const FORMAT = '_^(?<uuid>[a-f0-9\-]{36}) (?<id>[0-9]+) (?<path>\S+) (?<hsize>[0-9]+):(?<headers>{(.+)}),(?<bsize>[0-9]+):(?<body>.*),$_';
    private $data, $uuid, $browser, $path, $headers, $body;

    /**
     * Create a Mongrel request
     * 
     * @param string $message
     * @throws RequestException 
     */
    public function __construct( $message )
    {
        if( !is_string( $message ) )
        {
            throw new \InvalidArgumentException( 'Request message must be a string' );
        }
        
        if( !preg_match( self::FORMAT, $message, $this->data ) )
        {
            throw new RequestException( 'Invalid format. Failed to parse mongrel request' );
        }
        
        $this->uuid    = $this->data[ 'uuid' ];
        $this->browser = $this->data[ 'id' ];
        $this->path    = $this->data[ 'path' ];
        $this->headers = json_decode( $this->data[ 'headers' ], true );
        $this->body    = $this->data[ 'body' ];
    }
    
    /**
     * Get zmq socket uuid
     * 
     * @return string 
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Get mongrel browser id
     * 
     * @return int 
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Get URI
     * 
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get request headers
     * 
     * @return array 
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get request body
     * 
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }
}