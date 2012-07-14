<?php

namespace Mongrel\Request;

use \Mongrel\RequestException;

class BrowserStack extends \SplObjectStorage
{
    public function attach( $browser, $data = null )
    {
        if( !$browser instanceof Browser )
        {
            throw new RequestException( 'Invalid Browser' );
        }
        
        return parent::attach( $browser, $data );
    }
    
    public function offsetSet( $browser, $data = null )
    {
        return $this->attach( $browser, $data );
    }

    public function detach( $browser )
    {
        if( !$browser instanceof Browser )
        {
            throw new RequestException( 'Invalid Browser' );
        }
        
        return parent::detach( $browser );
    }
    
    public function offsetUnset( $browser )
    {
        return $this->detach( $browser );
    }
    
    public function __toString()
    {
        if( 0 === $this->count() )
        {
            throw new RequestException( 'No browsers specified' );
        }
        
        $browsers = array();
        
        foreach( $this as $browser )
        {
            $browsers[] = (string) $browser;
        }
        
        return implode( ' ', $browsers );
    }
}