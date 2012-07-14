<?php

namespace Mongrel\Http;

class ProtocolTest extends \PHPUnit_Framework_TestCase
{
    public function invalidDataProvider()
    {
        return array(
            array( 'HTTP/1.2' ),
            array( array() ),
            array( null ),
            array( 1 ),
            array( new \stdClass )
        );
    }
    
    public function validDataProvider()
    {
        return array(
            array( 'HTTP/1.0' ),
            array( 'HTTP/1.1' )
        );
    }
    
    /**
     * @dataProvider invalidDataProvider
     * @covers \Mongrel\Http\Protocol::__construct
     */
    public function testConstructorInvalid( $protocolString )
    {
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        new Protocol( $protocolString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Http\Protocol::__construct
     */
    public function testConstructor( $protocolString )
    {
        new Protocol( $protocolString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Http\Protocol::__toString
     */
    public function testTostring( $protocolString )
    {
        $protocol = new Protocol( $protocolString );
        
        $this->assertEquals( $protocolString, (string) $protocol );
        $this->assertEquals( $protocolString, $protocol->__toString() );
    }
}