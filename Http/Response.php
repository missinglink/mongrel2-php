<?php

namespace Mongrel\Http;

class Response
{
    const EOL = "\r\n";
    private $protocol;
    private $status;
    private $headers;
    private $body;
    
    /**
     * Create an HTTP response
     * 
     * @param string $body
     * @param array $headers
     * @param string $status
     * @param string $protocol 
     */
    public function __construct( $body = '', array $headers = array(), $status = '200 OK', $protocol = 'HTTP/1.1'  )
    {
        $this->body     = $body;
        $this->headers  = $headers;
        $this->status   = $status;
        $this->protocol = $protocol;
    }
    
    /**
     * Render response in raw HTTP format
     * 
     * @return string 
     */
    public function getMessage()
    {
        $data = sprintf( '%s %s', $this->protocol, $this->status ) . self::EOL;

        $this->headers[ 'Content-Length' ] = mb_strlen( $this->body );
        $this->headers[ 'Connection' ]     = 'close';
        
        foreach( $this->headers as $key => $value )
        {
            $data .= sprintf( '%s: %s', $key, $value ) . self::EOL;
        }
        
        return $data . self::EOL . $this->body;
    }
    
    /**
     * Set response body
     * 
     * @param string $body 
     */
    public function setBody( $body )
    {
        $this->body = $body;
    }
    
    /**
     * Set response headers
     * 
     * @param array $headers 
     */
    public function setHeaders( array $headers )
    {
        $this->headers = $headers;
    }
    
    /**
     * Set response status
     * 
     * @param string $status eg '200 OK'
     */
    public function setStatus( $status )
    {
        $this->status = $status;
    }
    
    /**
     * Set response protocol
     * 
     * @param string $protocol eg 'HTTP/1.1'
     */
    public function setProtocol( $protocol )
    {
        $this->protocol = $protocol;
    }
}