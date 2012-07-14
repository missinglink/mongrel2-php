<?php

namespace Mongrel\Http;

class Response
{
    const EOL = "\r\n";
    private $protocol, $status, $headers, $body;
    
    /**
     * Create an HTTP response
     * 
     * @param string $body
     * @param array $headers
     * @param string $status
     * @param string $protocol 
     */
    public function __construct( $body, $headers = null, $status = null, $protocol = null )
    {
        $this->body     = new Body( $body );
        $this->headers  = new Headers( $headers ?: array() );
        $this->status   = new Status( $status ?: '200 OK' );
        $this->protocol = new Protocol( $protocol ?: 'HTTP/1.1' );
        
        $this->headers->offsetSet( 'Content-Length', mb_strlen( $this->body ) );
    }
    
    /**
     * Build HTTP response message
     * 
     * @return string 
     */
    public function getMessage()
    {
        $data = sprintf( '%s %s', $this->protocol, $this->status ) . self::EOL;
        
        foreach( $this->headers as $key => $value )
        {
            $data .= sprintf( '%s: %s', $key, $value ) . self::EOL;
        }
        
        return $data . self::EOL . $this->body;
    }
    
    /**
     * Get response body
     * 
     * @return Body $body 
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * Get response headers
     * 
     * @return Headers $headers 
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    
    /**
     * Get response status
     * 
     * @return Status $status
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Get response protocol
     * 
     * @return Protocol $protocol
     */
    public function getProtocol()
    {
        return $this->protocol;
    }
}