<?php

namespace Mongrel;

class DsnExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Mongrel\DsnException::__construct
     */
    public function testConstructor()
    {
        $exception = new DsnException( 'test' );
        
        $this->assertTrue( $exception instanceof \RuntimeException );
        
        $this->setExpectedException( 'Mongrel\DsnException' );
        
        throw $exception;
    }
}