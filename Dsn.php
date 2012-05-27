<?php

namespace Mongrel;

class Dsn
{
    const FORMAT = '_^(?P<protocol>\w+)://(?P<ip>[\d\.\*]+):(?P<port>\d{1,5})$_';
    private $protocol, $ip, $port;
    
    /**
     * Create a new DSN
     * 
     * @param string $dsn
     * @throws DsnException 
     */
    public function __construct( $dsn )
    {
        if( !preg_match( self::FORMAT, $dsn, $matches ) )
        {
            throw new DsnException( 'Invalid DSN' );
        }
        
        $this->protocol = $matches[ 'protocol' ];
        $this->ip       = $matches[ 'ip' ];
        $this->port     = $matches[ 'port' ];
    }
    
    /**
     * Get protocol section
     * 
     * @return string 
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Get IP section
     * 
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get port section
     * 
     * @return string 
     */
    public function getPort()
    {
        return $this->port;
    }
    
    /**
     * Return DSN as string
     * 
     * @return string
     */
    public function toString()
    {
        return sprintf( '%s://%s:%s', $this->protocol, $this->ip, $this->port );
    }
}
