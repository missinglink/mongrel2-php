<?php

namespace Mongrel\Http;

class HeadersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Mongrel\Http\Headers::__construct
     */
    public function testConstructor()
    {
        $headers = new Headers( array( 'test' => 'test' ) );
        
        $this->assertTrue( $headers instanceof \ArrayObject );
        $this->assertEquals( 'test', $headers[ 'test' ] );
    }
}