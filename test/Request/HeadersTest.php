<?php

namespace Mongrel\Request;

class HeadersTest extends \PHPUnit_Framework_TestCase
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
    
    /**
     * @dataProvider invalidDataProvider
     * @covers \Mongrel\Request\Headers::__construct
     */
    public function testConstructorInvalid( $headersString )
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        new Headers( $headersString );
    }
    
    /**
     * @covers \Mongrel\Request\Headers::__construct
     */
    public function testConstructor()
    {
        $headers = new Headers( json_encode( array( 'hello' => 'world' ) ) );
        
        $this->assertTrue( $headers instanceof \ArrayObject );
        $this->assertEquals( 'world', $headers[ 'hello' ] );
    }
}