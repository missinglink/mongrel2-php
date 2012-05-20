<?php

namespace Mongrel;

require_once dirname( __FILE__ ) . '/../RequestException.php';

class RequestExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $exception = new RequestException( 'test' );
        
        $this->assertTrue( $exception instanceof \RuntimeException );
        
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        throw $exception;
    }
}