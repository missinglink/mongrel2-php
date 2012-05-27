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
     * Get response body
     * 
     * @return string $body 
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * Get response headers
     * 
     * @return array $headers 
     */
    public function getHeaders()
    {
        return $this->headers;
    }
    
    /**
     * Get response status
     * 
     * @return string $status eg '200 OK'
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Get response protocol
     * 
     * @return string $protocol eg 'HTTP/1.1'
     */
    public function getProtocol()
    {
        return $this->protocol;
    }
}