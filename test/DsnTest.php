<?php

namespace Mongrel;

class DsnTest extends \PHPUnit_Framework_TestCase
{
    public function invalidDsnProvider()
    {
        return array(
            array( 'tcp://127.0.0.1:999999' ),
            array( 'test' )
        );
    }
    
    public function validDsnProvider()
    {
        return array(
            array( 'tcp://127.0.0.1:9996', array( 'tcp', '127.0.0.1', '9996' ) ),
            array( 'tcp://*:8000', array( 'tcp', '*', '8000' ) )
        );
    }
    
    /** @dataProvider invalidDsnProvider **/
    public function testConstructor_InvalidParams( $dsn )
    {
        $this->setExpectedException( 'Mongrel\DsnException' );
        
        $object = new Dsn( $dsn );
    }
    
    /** @dataProvider validDsnProvider **/
    public function testConstructor_ValidParams( $dsn, $expected )
    {
        $object = new Dsn( $dsn );
        
        $this->assertAttributeSame( $expected[0], 'protocol', $object );
        $this->assertAttributeSame( $expected[1], 'ip', $object );
        $this->assertAttributeSame( $expected[2], 'port', $object );
    }

    /**
     * @dataProvider validDsnProvider
     * @covers \Mongrel\Dsn::getProtocol
     */
    public function testGetProtocol( $dsn, $expected )
    {
        $object = new Dsn( $dsn );
        
        $this->assertEquals( $expected[0], $object->getProtocol() );
    }

    /**
     * @dataProvider validDsnProvider
     * @covers \Mongrel\Dsn::getIp
     */
    public function testGetIp( $dsn, $expected )
    {
        $object = new Dsn( $dsn );
        
        $this->assertEquals( $expected[1], $object->getIp() );
    }

    /**
     * @dataProvider validDsnProvider
     * @covers \Mongrel\Dsn::getPort
     */
    public function testGetPort( $dsn, $expected )
    {
        $object = new Dsn( $dsn );
        
        $this->assertEquals( $expected[2], $object->getPort() );
    }
    
    /**
     * @dataProvider validDsnProvider
     * @covers \Mongrel\Dsn::toString
     */
    public function testToString( $dsn, $expected )
    {
        $object = new Dsn( $dsn );
        
        $this->assertEquals( $dsn, $object->toString() );
    }
}