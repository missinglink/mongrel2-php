<?php

namespace Mongrel;

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