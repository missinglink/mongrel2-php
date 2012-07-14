<?php

namespace Mongrel\Http;

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
    
    /**
     * @covers \Mongrel\Http\Client::__construct
     */
    public function testConstructor_InvalidParam()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        new Client( array() );
    }
    
    /**
     * @covers \Mongrel\Http\Client::__construct
     */
    public function testConstructor()
    {
        $client = new Client( $this->mongrelClient );
        
        $this->assertAttributeSame( $this->mongrelClient, 'client', $client );
    }
    
    /**
     * @covers \Mongrel\Http\Client::recv
     */
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

    /**
     * @covers \Mongrel\Http\Client::send
     * @todo improve test
     */
    public function testSend()
    {
        $httpResponse = $this->getMock( 'Mongrel\Http\Response', array( 'getMessage' ), array( 'test' ) );
        
        $httpResponse->expects( $this->once() )
            ->method( 'getMessage' )
            ->will( $this->returnValue( 'test' ) );

        $this->mongrelClient->expects( $this->once() )
                ->method( 'send' );
        
        $client = new Client( $this->mongrelClient );
        $client->send( $httpResponse, $this->mongrelRequest->getUuid(), $this->mongrelRequest->getBrowser() );
    }
    
    /**
     * @depends testSend
     * @covers \Mongrel\Http\Client::sendMulti
     * @todo improve test
     */
    public function testSendMulti()
    {
        $httpResponse = $this->getMock( 'Mongrel\Http\Response', array( 'getMessage' ), array( 'test' ) );
        
        $httpResponse->expects( $this->once() )
            ->method( 'getMessage' )
            ->will( $this->returnValue( 'test' ) );

        $this->mongrelClient->expects( $this->once() )
                ->method( 'send' );
        
        $client = new Client( $this->mongrelClient );
        $client->sendMulti( $httpResponse, $this->mongrelRequest->getUuid(), new \Mongrel\Request\BrowserStack( $this->mongrelRequest->getBrowser() ) );
    }
    
    /**
     * @depends testRecv
     * @depends testSend
     * @covers \Mongrel\Http\Client::reply
     */
    public function testReply()
    {
        $this->mongrelClient->expects( $this->once() )
            ->method( 'recv' )
            ->will( $this->returnValue( $this->mongrelRequest ) );
        
        $client = new Client( $this->mongrelClient );
        $recv = $client->recv();
        
        $httpResponse = $this->getMock( 'Mongrel\Http\Response', array( 'getMessage' ), array( 'test' ) );
        
        $httpResponse->expects( $this->once() )
            ->method( 'getMessage' )
            ->will( $this->returnValue( 'test' ) );

        $this->mongrelClient->expects( $this->once() )
                ->method( 'send' );
        
        $client = new Client( $this->mongrelClient );
        $client->reply( $httpResponse, $recv );
    }
}