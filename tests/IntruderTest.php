<?php

namespace duncan3dc\ObjectIntruderTests;

use duncan3dc\ObjectIntruder\Intruder;

class IntruderTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    private $intruder;

    public function setUp()
    {
        $this->class = new AnonymousClass;
        $this->intruder = new Intruder($this->class);
    }


    public function testGetPublicProperty()
    {
        $this->assertSame("R2-D2", $this->intruder->publicProperty);
    }


    public function testGetProtectedProperty()
    {
        $this->assertSame("C-3PO", $this->intruder->protectedProperty);
    }


    public function testGetPrivateProperty()
    {
        $this->assertSame("BB-8", $this->intruder->privateProperty);
    }
}
