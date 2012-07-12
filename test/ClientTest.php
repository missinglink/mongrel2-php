<?php

namespace Mongrel;

require_once dirname( __FILE__ ) . '/../Client.php';
require_once dirname( __FILE__ ) . '/../Dsn.php';

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public static $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
    public static $dsn = 'tcp://127.0.0.1:8000';
    
    public function setUp()
    {
        extension_loaded( 'zmq' ) || $this->markTestSkipped( 'Zmq PHP extension not loaded' );
    }
    
    public function dataProvider()
    {
        $context  = $this->getMock( 'ZMQContext', array( 'getSocket' ) );
        $front    = $this->getMock( 'ZMQSocket', array( 'connect', 'recv' ), array( $context, Client::FTYPE ) );
        $back     = $this->getMock( 'ZMQSocket', array( 'connect', 'send' ), array( $context, Client::BTYPE ) );
        $dsn      = $this->getMock( 'Mongrel\Dsn', array( 'toString' ), array( self::$dsn ) );
        $response = $this->getMockBuilder( 'Mongrel\Response' )->disableOriginalConstructor()->getMock();
        
        $context->expects( $this->at( 0 ) )
            ->method( 'getSocket' )
            ->with( Client::FTYPE )
            ->will( $this->returnValue( $front ) );
        
        $context->expects( $this->at( 1 ) )
            ->method( 'getSocket' )
            ->with( Client::BTYPE )
            ->will( $this->returnValue( $back ) );
        
        $dsn->expects( $this->any() )
            ->method( 'toString' )
            ->will( $this->returnValue( self::$dsn ) );
        
        $response->expects( $this->any() )
            ->method( 'getMessage' )
            ->will( $this->returnValue( self::$message ) );
        
        return array( array( $context, $front, $back, $dsn, $response ));
    }
    
    /** @dataProvider dataProvider */
    public function testConstructor_Context_InvalidType( $context, $front, $back, $dsn, $response )
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        new Client( new \stdClass, $dsn, $dsn );
    }
    
    /** @dataProvider dataProvider */
    public function testConstructor_FrontDsn_InvalidType( $context, $front, $back, $dsn, $response )
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        new Client( $context, new \stdClass, $dsn );
    }
    
    /** @dataProvider dataProvider */
    public function testConstructor_BackDsn_InvalidType( $context, $front, $back, $dsn, $response )
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        new Client( $context, $dsn, new \stdClass );
    }
    
    /** @dataProvider dataProvider */
    public function testConstructor( $context, $front, $back, $dsn, $response )
    {
        $front->expects( $this->exactly( 1 ) )
            ->method( 'connect' )
            ->with( self::$dsn );
                
        $back->expects( $this->exactly( 1 ) )
            ->method( 'connect' )
            ->with( self::$dsn );
        
        $client = new Client( $context, $dsn, $dsn );
        
        $this->assertAttributeSame( $front, 'frontend', $client );
        $this->assertAttributeSame( $back, 'backend', $client );
    }
    
    /** @dataProvider dataProvider */
    public function testRecv( $context, $front, $back, $dsn, $response )
    {
        $front->expects( $this->exactly( 1 ) )
            ->method( 'recv' )
            ->will( $this->returnValue( self::$message ) );
        
        $client = new Client( $context, $dsn, $dsn );
        $recv = $client->recv();
        
        $this->assertEquals( new \Mongrel\Request( self::$message ), $recv );
    }

    /** @dataProvider dataProvider */
    public function testSend( $context, $front, $back, $dsn, $response )
    {       
        $back->expects( $this->exactly( 1 ) )
            ->method( 'send' )
            ->with( $response->getMessage() )
            ->will( $this->returnValue( $back ) );
        
        $client = new Client( $context, $dsn, $dsn );
        $client->send( $response );
    }
}