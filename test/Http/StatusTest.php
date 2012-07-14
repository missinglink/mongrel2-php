<?php

namespace Mongrel\Http;

class StatusTest extends \PHPUnit_Framework_TestCase
{
    public function invalidDataProvider()
    {
        return array(
            array( 'hello world' ),
            array( array() ),
            array( null ),
            array( 1 ),
            array( new \stdClass )
        );
    }
    
    public function validDataProvider()
    {
        return array(
            array( '200 OK' )
        );
    }
    
    /**
     * @dataProvider invalidDataProvider
     * @covers \Mongrel\Http\Status::__construct
     */
    public function testConstructorInvalid( $statusString )
    {
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        new Status( $statusString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Http\Status::__construct
     */
    public function testConstructor( $statusString )
    {
        new Status( $statusString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Http\Status::__toString
     */
    public function testTostring( $statusString )
    {
        $status = new Status( $statusString );
        
        $this->assertEquals( $statusString, (string) $status );
        $this->assertEquals( $statusString, $status->__toString() );
    }
}