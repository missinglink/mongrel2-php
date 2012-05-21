<?php

namespace Mongrel;

class Response
{
    const FORMAT = '%s %d:%s, %s';
    private $uuid, $browsers, $data;
    
    /**
     * Create a Mongrel response
     * 
     * @param string $data
     */
    public function __construct( $data = '' )
    {
        $this->setData( $data );
    }
    
    /**
     * Render response in Mongrel format
     * 
     * @return string 
     */
    public function getMessage()
    {
        if( !is_string( $this->uuid ) || !is_string( $this->browsers ) )
        {
            throw new ResponseException( 'Invalid response. You must specify a target uuid and browser id(s)' );
        }
        
        return sprintf( self::FORMAT, $this->uuid, strlen( $this->browsers ), $this->browsers, $this->data );
    }
    
    /**
     * Use the creator of a request as the target for this response
     * 
     * @param Request $request 
     */
    public function replyTo( Request $request )
    {
        $this->uuid     = $request->getUuid();
        $this->browsers = $request->getBrowser();
        
        return $this;
    }
    
    /**
     * Set target uuid
     * 
     * @param string $uuid 
     */
    public function setUuid( $uuid )
    {
        if( !is_string( $uuid ) )
        {
            throw new \InvalidArgumentException( 'Response uuid must be a string' );
        }
        
        $this->uuid = $uuid;
    }

    /**
     * Set target browser ids
     * 
     * @param array $browsers 
     */
    public function setBrowsers( array $browsers )
    {
        $this->browsers = implode( ' ', $browsers );
    }
    
    /**
     * Set response body
     * 
     * @param string $data 
     */
    public function setData( $data )
    {
        if( !is_string( $data ) )
        {
            throw new \InvalidArgumentException( 'Response data must be a string' );
        }
        
        $this->data = $data;
    }
}