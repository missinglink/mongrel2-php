<?php

namespace Mongrel;

class ResponseExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Mongrel\ResponseException::__construct
     */
    public function testConstructor()
    {
        $exception = new ResponseException( 'test' );
        
        $this->assertTrue( $exception instanceof \RuntimeException );
        
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        throw $exception;
    }
}