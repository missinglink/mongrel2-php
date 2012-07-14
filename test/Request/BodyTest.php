<?php

namespace Mongrel\Request;

class BodyTest extends \PHPUnit_Framework_TestCase
{
    public function invalidDataProvider()
    {
        return array(
            array( 1 ),
            array( null ),
            array( array() ),
            array( new \stdClass )
        );
    }
    
    public function validDataProvider()
    {
        return array(
            array( 'hello world' )
        );
    }
    
    /**
     * @dataProvider invalidDataProvider
     * @covers \Mongrel\Request\Body::__construct
     */
    public function testConstructorInvalid( $bodyString )
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        new Body( $bodyString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Body::__construct
     */
    public function testConstructor( $bodyString )
    {
        new Body( $bodyString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Body::__toString
     */
    public function testTostring( $bodyString )
    {
        $body = new Body( $bodyString );
        
        $this->assertEquals( $bodyString, (string) $body );
        $this->assertEquals( $bodyString, $body->__toString() );
    }
}