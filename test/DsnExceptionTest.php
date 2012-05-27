<?php

namespace Mongrel;

require_once dirname( __FILE__ ) . '/../DsnException.php';

class DsnExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $exception = new DsnException( 'test' );
        
        $this->assertTrue( $exception instanceof \RuntimeException );
        
        $this->setExpectedException( 'Mongrel\DsnException' );
        
        throw $exception;
    }
}