<?php

namespace Mongrel\Http;

class HeadersTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $headers = new Headers( array( 'test' => 'test' ) );
        
        $this->assertTrue( $headers instanceof \ArrayObject );
        $this->assertEquals( 'test', $headers[ 'test' ] );
    }
}