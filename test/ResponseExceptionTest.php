<?php

namespace Mongrel;

require_once dirname( __FILE__ ) . '/../ResponseException.php';

class ResponseExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $exception = new ResponseException( 'test' );
        
        $this->assertTrue( $exception instanceof \RuntimeException );
        
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        throw $exception;
    }
}