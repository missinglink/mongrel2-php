<?php

namespace Mongrel;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    static $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
    
    public static function dataProvider()
    {
        return array( array( new Request( self::$message ) ) );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::__construct
     */
    public function testConstructor_ParamIsNotString()
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        new Request( array() );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::__construct
     */
    public function testConstructor_Invalid_Message()
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        new Request( 'invalid message' );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::__construct
     */
    public function testConstructor( Request $request )
    {
        $this->assertAttributeInstanceOf( '\Mongrel\Request\Uuid', 'uuid', $request );
        $this->assertAttributeInstanceOf( '\Mongrel\Request\Browser', 'browser', $request );
        $this->assertAttributeInstanceOf( '\Mongrel\Request\Path', 'path', $request );
        $this->assertAttributeInstanceOf( '\Mongrel\Request\Headers', 'headers', $request );
        $this->assertAttributeInstanceOf( '\Mongrel\Request\Body', 'body', $request );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::getUuid
     */
    public function testGetUuid( Request $request )
    {
        $this->assertEquals( '288c0bca-f46c-46dc-b15a-bdd581c30e38', (string) $request->getUuid() );
    }

    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::getBrowser
     */
    public function testGetBrowser( Request $request )
    {
        $this->assertEquals( '99', (string) $request->getBrowser() );
    }

    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::getPath
     */
    public function testGetPath( Request $request )
    {
        $this->assertEquals( '/favicon.ico', (string) $request->getPath() );
    }

    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::getHeaders
     */
    public function testGetHeaders( Request $request )
    {
        $this->assertEquals( array( 'PATH' => '/favicon.ico' ), $request->getHeaders()->getArrayCopy() );
    }
    
    /**
     * @dataProvider dataProvider
     * @covers \Mongrel\Request::getBody
     */
    public function testGetBody( Request $request )
    {
        $this->assertEquals( 'foo=bar', (string) $request->getBody() );
    }
}