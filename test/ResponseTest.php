<?php

namespace Mongrel;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    static $uuid = '288c0bca-f46c-46dc-b15a-bdd581c30e38';
    
    public static function dataProvider()
    {
        $uuid     = new Request\Uuid( self::$uuid );
        $browsers = new Request\BrowserStack;
        $browsers->attach( new Request\Browser( 1 ) );
        $browsers->attach( new Request\Browser( 2 ) );
        $response = new Response( $uuid, $browsers );
        
        return array( array( $response ) );
    }
    
    /**
     * @covers \Mongrel\Response::__construct
     */
    public function testConstructor_ParamIsNotString()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        new Response( array() );
    }

    /**
     * @covers \Mongrel\Response::__construct
     */
    public function testConstructor_MissingParams()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        new Response;
    }
    
    /**
     * @covers \Mongrel\Response::__construct
     */
    public function testConstructor_InvalidTypeParams()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        new Response( new \stdClass, new \stdClass );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Response::__construct
     */
    public function testConstructor( Response $response )
    {
        $this->assertInstanceOf( 'Mongrel\Response', $response );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Response::getMessage
     */
    public function testGetMessage_NoBrowsersSpecified( Response $response )
    {
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        $response = new Response( new Request\Uuid( self::$uuid ), new Request\BrowserStack );
        $response->getMessage();
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Response::getMessage
     */
    public function testGetMessage( Response $response )
    {
        $response->setBody( 'test' );
        
        $this->assertEquals( self::$uuid . ' 3:1 2, test', $response->getMessage() );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Response::setBody
     */
    public function testSetBody_InvalidParam( Response $response )
    {
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        $response->setBody( array() );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Response::setBody
     */
    public function testSetBody( Response $response )
    {
        $response->setBody( 'test' );
        
        $this->assertAttributeSame( 'test', 'body', $response );
    }
}