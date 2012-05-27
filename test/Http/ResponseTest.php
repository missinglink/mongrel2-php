<?php

namespace Mongrel\Http;

require_once dirname( __FILE__ ) . '/../../Http/Response.php';

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructorAndGetters()
    {
        $response = new Response( 'a', array( 'b' => 'c' ), 'd', 'e' );
        
        $this->assertEquals( 'a', $response->getBody() );
        $this->assertEquals( array( 'b' => 'c' ), $response->getHeaders() );
        $this->assertEquals( 'd', $response->getStatus() );
        $this->assertEquals( 'e', $response->getProtocol() );
    }
    
    public function testGetMessage()
    {
        $response = new Response( '<p>Hello World</p>', array( 'Content-Type' => 'text/html' ), '200 OK', 'HTTP/1.1' );
        
        $expected  = "HTTP/1.1 200 OK\r\n";
        $expected .= "Content-Type: text/html\r\n";
        $expected .= "Content-Length: ". mb_strlen( '<p>Hello World</p>' ) ."\r\n";
        $expected .= "Connection: close\r\n";
        $expected .= "\r\n";
        $expected .= '<p>Hello World</p>';
        
        $this->assertEquals( $expected, $response->getMessage() );
    }
}