<?php

namespace Mongrel\Http;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor_InvalidMongrelHeaders()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        
        $mockMongrelRequest = $this->getMockBuilder( 'Mongrel\Request' )
            ->disableOriginalConstructor()
            ->getMock();
        
        $mockMongrelRequest->expects( $this->exactly( 1 ) )
            ->method( 'getHeaders' )
            ->will( $this->returnValue( null ) );
        
        $request = new Request( $mockMongrelRequest );
    }
    
    public function testGetMongrelRequest()
    {
        $mockMongrelRequest = $this->getMockBuilder( 'Mongrel\Request' )
            ->disableOriginalConstructor()
            ->getMock();
        
        $mockMongrelRequest->expects( $this->exactly( 1 ) )
            ->method( 'getHeaders' )
            ->will( $this->returnValue( array( 'test' => 'test' ) ) );
        
        $request = new Request( $mockMongrelRequest );
        
        $this->assertSame( $mockMongrelRequest, $request->getMongrelRequest() );
    }

    public function testGetHeaders()
    {
        $mockMongrelRequest = $this->getMockBuilder( 'Mongrel\Request' )
            ->disableOriginalConstructor()
            ->getMock();
        
        $mockMongrelRequest->expects( $this->exactly( 1 ) )
            ->method( 'getHeaders' )
            ->will( $this->returnValue( array( 'test' => 'test' ) ) );
        
        $request = new Request( $mockMongrelRequest );
        
        $this->assertSame( array( 'test' => 'test' ), $request->getHeaders()->getArrayCopy() );
    }

    public function testGetQuery()
    {
        $mockMongrelRequest = $this->getMockBuilder( 'Mongrel\Request' )
            ->disableOriginalConstructor()
            ->getMock();
        
        $mockMongrelRequest->expects( $this->exactly( 1 ) )
            ->method( 'getHeaders' )
            ->will( $this->returnValue( array( 'QUERY' => 'foo=bar' ) ) );
        
        $request = new Request( $mockMongrelRequest );
        
        $this->assertSame( $mockMongrelRequest, $request->getMongrelRequest() );
        $this->assertSame( 'foo=bar', $request->getQuery()->toString() );
    }
}