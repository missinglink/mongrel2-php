<?php

namespace Mongrel\Request;

class BrowserTest extends \PHPUnit_Framework_TestCase
{
    public function invalidDataProvider()
    {
        return array(
            array( 'hello world' ),
            array( null ),
            array( array() ),
            array( new \stdClass )
        );
    }
    
    public function validDataProvider()
    {
        return array(
            array( 1 )
        );
    }
    
    /**
     * @dataProvider invalidDataProvider
     * @covers \Mongrel\Request\Browser::__construct
     */
    public function testConstructorInvalid( $browserString )
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        new Browser( $browserString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Browser::__construct
     */
    public function testConstructor( $browserString )
    {
        new Browser( $browserString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Browser::__toString
     */
    public function testTostring( $browserString )
    {
        $browser = new Browser( $browserString );
        
        $this->assertEquals( $browserString, (string) $browser );
        $this->assertEquals( $browserString, $browser->__toString() );
    }
}