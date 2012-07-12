<?php

namespace Mongrel;

require_once dirname( __FILE__ ) . '/../Client.php';
require_once dirname( __FILE__ ) . '/../Dsn.php';

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        extension_loaded( 'zmq' ) || $this->markTestSkipped( 'Zmq PHP extension not loaded' );
                
        $this->context = $this->getMock( 'ZMQContext', array( 'getSocket' ) );
    }
    
    public function testConstructor_FrontDsn_IsNotString()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        $client = new Client( $this->context, array(), new Dsn( 'tcp://127.0.0.1:8000' ) );
    }
    
    public function testConstructor_BackDsn_IsNotString()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        $client = new Client( $this->context, new Dsn( 'tcp://127.0.0.1:8000' ), array() );
    }
    
    public function testConstructor()
    {
        $frontMock = $this->getMock( 'ZMQSocket', array( 'connect' ), array( $this->context, \ZMQ::SOCKET_UPSTREAM ) );
        
        $frontMock->expects( $this->exactly( 1 ) )
            ->method( 'connect' )
            ->with( 'tcp://127.0.0.1:8000' );
                
        $backMock = $this->getMock( 'ZMQSocket', array( 'connect' ), array( $this->context, \ZMQ::SOCKET_PUB ) );
        
        $backMock->expects( $this->exactly( 1 ) )
            ->method( 'connect' )
            ->with( 'tcp://127.0.0.1:8001' );
        
        $this->context->expects( $this->at( 0 ) )
            ->method( 'getSocket' )
            ->with( \ZMQ::SOCKET_UPSTREAM )
            ->will( $this->returnValue( $frontMock ) );
        
        $this->context->expects( $this->at( 1 ) )
            ->method( 'getSocket' )
            ->with( \ZMQ::SOCKET_PUB )
            ->will( $this->returnValue( $backMock ) );
        
        $client = new Client( $this->context, new Dsn( 'tcp://127.0.0.1:8000' ), new Dsn( 'tcp://127.0.0.1:8001' ) );
    }
    
    public function testRecv()
    {
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        
        $frontMock = $this->getMock( 'ZMQSocket', array( 'connect', 'recv' ), array( $this->context, \ZMQ::SOCKET_UPSTREAM ) );
        $backMock = $this->getMock( 'ZMQSocket', array( 'connect', 'recv' ), array( $this->context, \ZMQ::SOCKET_PUB ) );
        
        $frontMock->expects( $this->exactly( 1 ) )
            ->method( 'recv' )
            ->will( $this->returnValue( $message ) );

        $this->context->expects( $this->at( 0 ) )
            ->method( 'getSocket' )
            ->with( \ZMQ::SOCKET_UPSTREAM )
            ->will( $this->returnValue( $frontMock ) );
        
        $this->context->expects( $this->at( 1 ) )
            ->method( 'getSocket' )
            ->with( \ZMQ::SOCKET_PUB )
            ->will( $this->returnValue( $backMock ) );
        
        $client = new Client( $this->context, new Dsn( 'tcp://127.0.0.1:8000' ), new Dsn( 'tcp://127.0.0.1:8001' ) );
        $recv = $client->recv();
        
        $this->assertEquals( new \Mongrel\Request( $message ), $recv );
    }

    public function testSend()
    {
        $response = new \Mongrel\Response(
            new Request\Uuid( str_repeat( 'a', 36 ) ),
            new Request\BrowserStack( new Request\Browser( 1 ) )
        );
        $response->setBody( 'test' );
        
        $frontMock = $this->getMock( 'ZMQSocket', array( 'connect', 'send' ), array( $this->context, \ZMQ::SOCKET_UPSTREAM ) );
        $backMock = $this->getMock( 'ZMQSocket', array( 'connect', 'send' ), array( $this->context, \ZMQ::SOCKET_PUB ) );
        
        $backMock->expects( $this->exactly( 1 ) )
            ->method( 'send' )
            ->with( $response->getMessage() )
            ->will( $this->returnValue( $backMock ) );

        $this->context->expects( $this->at( 0 ) )
            ->method( 'getSocket' )
            ->with( \ZMQ::SOCKET_UPSTREAM )
            ->will( $this->returnValue( $frontMock ) );
        
        $this->context->expects( $this->at( 1 ) )
            ->method( 'getSocket' )
            ->with( \ZMQ::SOCKET_PUB )
            ->will( $this->returnValue( $backMock ) );
        
        $client = new Client( $this->context, new Dsn( 'tcp://127.0.0.1:8000' ), new Dsn( 'tcp://127.0.0.1:8001' ) );
        $client->send( $response );
    }
}