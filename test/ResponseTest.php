<?php

namespace Mongrel;

require_once dirname( __FILE__ ) . '/../Response.php';
require_once dirname( __FILE__ ) . '/../ResponseException.php';
require_once dirname( __FILE__ ) . '/../Http/Request.php';

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor_ParamIsNotString()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        
        $response = new Response( array() );
    }
    
    public function testConstructor_ParamIsOptional()
    {
        $response = new Response;
        
        $this->assertAttributeSame( '', 'data', $response );
    }
    
    public function testConstructor()
    {
        $response = new Response( 'test' );
        
        $this->assertAttributeSame( 'test', 'data', $response );
    }
    
    public function testGetMessage_NoUuid()
    {
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        $response = new Response;
        $response->setBrowsers( array( 1 ) );
        $response->setData( 'test' );
        
        $response->getMessage();
    }
    
    public function testGetMessage_NoBrowsers()
    {
        $this->setExpectedException( 'Mongrel\ResponseException' );
        
        $response = new Response;
        $response->setUuid( 'test' );
        $response->setData( 'test' );
        
        $response->getMessage();
    }
    
    public function testGetMessage()
    {
        $response = new Response;
        $response->setUuid( 'test' );
        $response->setBrowsers( array( 1, 2 ) );
        $response->setData( 'test' );
        
        $message = $response->getMessage();
        
        $this->assertEquals( sprintf( Response::FORMAT, 'test', strlen( '1 2' ), '1 2', 'test' ), $message );
    }

    public function testReplyTo_InvalidParam()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        $response = new Response;
        $response->replyTo( array() );
    }

    public function testSetUuid_InvalidParam()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        
        $response = new Response;
        $response->setUuid( array() );
    }
    
    public function testSetUuid()
    {
        $response = new Response;
        $response->setUuid( 'test' );
        
        $this->assertAttributeSame( 'test', 'uuid', $response );
    }

    public function testSetBrowsers_InvalidParam()
    {
        $this->setExpectedException( 'PHPUnit_Framework_Error' );
        
        $response = new Response;
        $response->setBrowsers( 'string' );
    }
    
    public function testSetBrowsers()
    {
        $response = new Response;
        $response->setBrowsers( array( 1, 2 ) );
        
        $this->assertAttributeSame( '1 2', 'browsers', $response );
    }
    
    public function testSetData_InvalidParam()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        
        $response = new Response;
        $response->setData( array() );
    }
    
    public function testSetData()
    {
        $response = new Response;
        $response->setData( 'test' );
        
        $this->assertAttributeSame( 'test', 'data', $response );
    }
}