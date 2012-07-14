<?php

namespace Mongrel\Http;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Mongrel\Http\Response::__construct
     */
    public function testConstructorAndGetters()
    {
        $response = new Response( 'a', array( 'b' => 'c' ), '404 Not Found', 'HTTP/1.0' );
        
        $this->assertEquals( 'a', $response->getBody() );
        $this->assertEquals( array( 'b' => 'c', 'Content-Length' => 1 ), $response->getHeaders()->getArrayCopy() );
        $this->assertEquals( '404 Not Found', $response->getStatus() );
        $this->assertEquals( 'HTTP/1.0', $response->getProtocol() );
    }
    
    /**
     * @covers \Mongrel\Http\Response::getMessage
     */
    public function testGetMessage()
    {
        $response = new Response( '<p>Hello World</p>', array( 'Content-Type' => 'text/html' ), '200 OK', 'HTTP/1.1' );
        
        $expected  = "HTTP/1.1 200 OK\r\n";
        $expected .= "Content-Type: text/html\r\n";
        $expected .= "Content-Length: ". mb_strlen( '<p>Hello World</p>' ) ."\r\n";
        $expected .= "\r\n";
        $expected .= '<p>Hello World</p>';
        
        $this->assertEquals( $expected, $response->getMessage() );
    }
    
    /**
     * @covers \Mongrel\Http\Response::getBody
     */
    public function testGetBody()
    {
        $response = new Response( '<p>Hello World</p>', array( 'Content-Type' => 'text/html' ), '200 OK', 'HTTP/1.1' );
        
        $this->assertEquals( '<p>Hello World</p>', (string) $response->getBody() );
    }
    
    /**
     * @covers \Mongrel\Http\Response::getHeaders
     */
    public function testGetHeaders()
    {
        $response = new Response( '<p>Hello World</p>', array( 'Content-Type' => 'text/html' ), '200 OK', 'HTTP/1.1' );
        
        $this->assertEquals( array( 'Content-Type' => 'text/html', 'Content-Length' => 18 ), $response->getHeaders()->getArrayCopy() );
    }
    
    /**
     * @covers \Mongrel\Http\Response::getStatus
     */
    public function testGetStatus()
    {
        $response = new Response( '<p>Hello World</p>', array( 'Content-Type' => 'text/html' ), '200 OK', 'HTTP/1.1' );
        
        $this->assertEquals( '200 OK', (string) $response->getStatus() );
    }
    
    /**
     * @covers \Mongrel\Http\Response::getProtocol
     */
    public function testGetProtocol()
    {
        $response = new Response( '<p>Hello World</p>', array( 'Content-Type' => 'text/html' ), '200 OK', 'HTTP/1.1' );
        
        $this->assertEquals( 'HTTP/1.1', (string) $response->getProtocol() );
    }
}