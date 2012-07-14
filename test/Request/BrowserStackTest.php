<?php

namespace Mongrel\Request;

class BrowserStackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Mongrel\Request\BrowserStack::attach
     */
    public function testAttach_InvalidBrowser()
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        $browsers = new BrowserStack;
        $browsers->attach( new \stdClass );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::attach
     */
    public function testAttach()
    {
        $browsers = new BrowserStack;
        $browsers->attach( new Browser( 1 ) );
        
        $this->assertEquals( 1, $browsers->count() );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::offsetSet
     */
    public function testOffsetSet_InvalidBrowser()
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        $browsers = new BrowserStack;
        $browsers->offsetSet( new \stdClass );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::offsetSet
     */
    public function testOffsetSet()
    {
        $browsers = new BrowserStack;
        $browsers->offsetSet( new Browser( 1 ) );
        
        $this->assertEquals( 1, $browsers->count() );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::detach
     */
    public function testDettach_InvalidBrowser()
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        $browsers = new BrowserStack;
        $browsers->detach( new \stdClass );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::detach
     */
    public function testDettach()
    {
        $browsers = new BrowserStack;
        $browser = new Browser( 1 );
        
        $browsers->attach( $browser );
        $this->assertEquals( 1, $browsers->count() );
        
        $browsers->detach( $browser );
        $this->assertEquals( 0, $browsers->count() );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::offsetUnset
     */
    public function testOffsetUnSet_InvalidBrowser()
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        $browsers = new BrowserStack;
        $browsers->offsetUnset( new \stdClass );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::offsetUnset
     */
    public function testOffsetUnSet()
    {
        $browsers = new BrowserStack;
        $browser = new Browser( 1 );
        
        $browsers->offsetSet( $browser );
        $this->assertEquals( 1, $browsers->count() );
        
        $browsers->offsetUnset( $browser );
        $this->assertEquals( 0, $browsers->count() );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::__toString
     */
    public function testTostring_NoBrowsers()
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        $browsers = new BrowserStack;
        $browsers->__toString();
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::__toString
     */
    public function testTostring_SingleBrowser()
    {
        $browsers = new BrowserStack;
        $browsers->attach( new Browser( 1 ) );
        
        $this->assertEquals( '1', (string) $browsers );
        $this->assertEquals( '1', $browsers->__toString() );
    }
    
    /**
     * @covers \Mongrel\Request\BrowserStack::__toString
     */
    public function testTostring_MultipleBrowsers()
    {
        $browsers = new BrowserStack;
        $browsers->attach( new Browser( 1 ) );
        $browsers->attach( new Browser( 2 ) );
        
        $this->assertEquals( '1 2', (string) $browsers );
        $this->assertEquals( '1 2', $browsers->__toString() );
    }
}