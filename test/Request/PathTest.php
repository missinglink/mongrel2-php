<?php

namespace Mongrel\Request;

class PathTest extends \PHPUnit_Framework_TestCase
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
            array( '/favicon.ico' )
        );
    }
    
    /**
     * @dataProvider invalidDataProvider
     * @covers \Mongrel\Request\Path::__construct
     */
    public function testConstructorInvalid( $pathString )
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        new Path( $pathString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Path::__construct
     */
    public function testConstructor( $pathString )
    {
        new Path( $pathString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Path::__toString
     */
    public function testTostring( $pathString )
    {
        $path = new Path( $pathString );
        
        $this->assertEquals( $pathString, (string) $path );
        $this->assertEquals( $pathString, $path->__toString() );
    }
}