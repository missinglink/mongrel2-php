<?php

namespace Mongrel;

require_once dirname( __FILE__ ) . '/../Request.php';
require_once dirname( __FILE__ ) . '/../RequestException.php';

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor_ParamIsNotString()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        
        $request = new Request( array() );
    }
    
    public function testConstructor_MessageParser_Invalid1()
    {
        $message = 'test';
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        $request = new Request( $message );
    }
    
    public function testConstructor_MessageParser_Valid1()
    {
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        $request = new Request( $message );
        
        $this->assertAttributeSame( '288c0bca-f46c-46dc-b15a-bdd581c30e38', 'uuid', $request );
        $this->assertAttributeSame( '99', 'browser', $request );
        $this->assertAttributeSame( '/favicon.ico', 'path', $request );
        $this->assertAttributeSame( array( 'PATH' => '/favicon.ico' ), 'headers', $request );
        $this->assertAttributeSame( 'foo=bar', 'body', $request );
    }
    
    public function testGetUuid()
    {
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        $request = new Request( $message );
        
        $this->assertEquals( '288c0bca-f46c-46dc-b15a-bdd581c30e38', $request->getUuid() );
    }

    public function testGetBrowser()
    {
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        $request = new Request( $message );
        
        $this->assertEquals( '99', $request->getBrowser() );
    }

    public function testGetPath()
    {
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        $request = new Request( $message );
        
        $this->assertEquals( '/favicon.ico', $request->getPath() );
    }

    public function testGetHeaders()
    {
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        $request = new Request( $message );
        
        $this->assertEquals( array( 'PATH' => '/favicon.ico' ), $request->getHeaders() );
    }
    
    public function testGetBody()
    {
        $message = '288c0bca-f46c-46dc-b15a-bdd581c30e38 99 /favicon.ico 23:{"PATH":"/favicon.ico"},0:foo=bar,';
        $request = new Request( $message );
        
        $this->assertEquals( 'foo=bar', $request->getBody() );
    }
}