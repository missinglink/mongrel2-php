<?php

namespace Mongrel\Http;

require_once dirname( __FILE__ ) . '/../../Client.php';
require_once dirname( __FILE__ ) . '/../../Request.php';
require_once dirname( __FILE__ ) . '/../../Response.php';
require_once dirname( __FILE__ ) . '/../../Http/Client.php';
require_once dirname( __FILE__ ) . '/../../Http/Headers.php';
require_once dirname( __FILE__ ) . '/../../Http/Response.php';

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        extension_loaded( 'zmq' ) || $this->markTestSkipped( 'Zmq PHP extension not loaded' );
        
        $this->mongrelClient = $this->getMockBuilder( 'Mongrel\Client' )
            ->disableOriginalConstructor()
            ->getMock();
        
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        $this->mongrelRequest = $this->getMock( 'Mongrel\Request', null, array( $message ) );
    }
    
    public function testConstructor_InvalidParam()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        $client = new Client( array() );
    }
    
    public function testConstructor()
    {
        $client = new Client( $this->mongrelClient );
        
        $this->assertAttributeSame( $this->mongrelClient, 'client', $client );
    }
    
    public function testRecv()
    {
        $this->mongrelClient->expects( $this->once() )
            ->method( 'recv' )
            ->will( $this->returnValue( $this->mongrelRequest ) );
        
        $client = new Client( $this->mongrelClient );
        $recv = $client->recv();
        
        $this->assertEquals( 'Mongrel\Http\Request', get_class( $recv ) );
        $this->assertSame( $this->mongrelRequest, $recv->getMongrelRequest() );
    }

    public function testSend()
    {
        $httpResponse = $this->getMock( 'Mongrel\Http\Response', array( 'getMessage' ) );
        
        $httpResponse->expects( $this->once() )
            ->method( 'getMessage' )
            ->will( $this->returnValue( 'test' ) );

        $this->mongrelClient->expects( $this->once() )
                ->method( 'send' );
        
        $client = new Client( $this->mongrelClient );
        $client->send( $httpResponse, $this->mongrelRequest );
    }
}