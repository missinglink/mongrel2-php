<?php

namespace Mongrel\Request;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    public function invalidDataProvider()
    {
        return array(
            array( '288c0bcaf46c46dcb15abdd581c30e38' ),
            array( '288c0bca f46c 46dc b15a bdd581c30e38' ),
            array( 'test' )
        );
    }
    
    public function validDataProvider()
    {
        return array(
            array( '288c0bca-f46c-46dc-b15a-bdd581c30e38' )
        );
    }
    
    /**
     * @dataProvider invalidDataProvider
     * @covers \Mongrel\Request\Uuid::__construct
     */
    public function testConstructorInvalid( $uuidString )
    {
        $this->setExpectedException( 'Mongrel\RequestException' );
        
        new Uuid( $uuidString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Uuid::__construct
     */
    public function testConstructor( $uuidString )
    {
        new Uuid( $uuidString );
    }
    
    /**
     * @dataProvider validDataProvider
     * @covers \Mongrel\Request\Uuid::__toString
     */
    public function testTostring( $uuidString )
    {
        $uuid = new Uuid( $uuidString );
        
        $this->assertEquals( $uuidString, (string) $uuid );
        $this->assertEquals( $uuidString, $uuid->__toString() );
    }
}