<?php

namespace Mongrel\Request;

class BrowserStack extends \SplObjectStorage
{
    public function attach( Browser $browser, $data = null )
    {
        return parent::attach( $browser, $data );
    }
    
    public function offsetSet( $browser, $value = null )
    {
        return $this->attach( $browser, $data );
    }

    public function detach( Browser $browser )
    {
        return parent::detach( $browser );
    }
    
    public function offsetUnset( $browser )
    {
        return $this->detach( $browser, $data );
    }
    
    public function __toString()
    {        
        $browsers = array();
        
        foreach( $this as $browser )
        {
            $browsers[] = (string) $browser;
        }
        
        return implode( ' ', $browsers );
    }
}