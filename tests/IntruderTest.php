<?php

namespace duncan3dc\ObjectIntruderTests;

use duncan3dc\ObjectIntruder\Intruder;
use PHPUnit\Framework\TestCase;

class IntruderTest extends TestCase
{
    /** @var AnonymousClass */
    private $class;

    /** @var Intruder */
    private $intruder;


    public function setUp(): void
    {
        $this->class = new AnonymousClass();
        $this->intruder = new Intruder($this->class);
    }


    public function testConstructorOnInvalidObject(): void
    {
        $this->expectException(\TypeError::class);
        new Intruder('invalid_object');
    }


    public function testGetPublicProperty(): void
    {
        $this->assertSame("R2-D2", $this->intruder->publicProperty);
    }


    public function testGetProtectedProperty(): void
    {
        $this->assertSame("C-3PO", $this->intruder->protectedProperty);
    }


    public function testGetPrivateProperty(): void
    {
        $this->assertSame("BB-8", $this->intruder->privateProperty);
    }


    public function testSetPublicProperty(): void
    {
        $this->intruder->publicProperty = "a new hope";
        $this->assertSame("a new hope", $this->class->publicProperty);
    }


    public function testSetProtectedProperty(): void
    {
        $this->intruder->protectedProperty = "the empire strikes back";
        $this->assertSame("the empire strikes back", $this->intruder->protectedProperty);
    }


    public function testSetPrivateProperty(): void
    {
        $this->intruder->privateProperty = "return of the jedi";
        $this->assertSame("return of the jedi", $this->intruder->privateProperty);
    }


    public function testCallPublicMethod(): void
    {
        $this->assertSame("episode", $this->intruder->publicMethod());
    }


    public function testCallProtectedMethod(): void
    {
        $this->assertSame("episode: rogue", $this->intruder->protectedMethod("rogue"));
    }


    public function testCallPrivateMethod(): void
    {
        $this->assertSame("episode: rogue - one", $this->intruder->privateMethod("rogue", "one"));
    }


    public function testCallMethodWithReferences(): void
    {
        $stuff = "start";
        $result = $this->intruder->_call("referenceMethod", $stuff);
        $this->assertSame("done", $result);
        $this->assertSame("modified", $stuff);
    }


    public function testToString(): void
    {
        $this->assertSame("star wars", (string) $this->intruder);
    }
}
