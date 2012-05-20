<?php

namespace Mongrel\Http;

require_once dirname( __FILE__ ) . '/../../Http/Headers.php';

class HeadersTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $headers = new Headers( array( 'test' => 'test' ) );
        
        $this->assertTrue( $headers instanceof \ArrayObject );
        $this->assertEquals( 'test', $headers[ 'test' ] );
    }
}