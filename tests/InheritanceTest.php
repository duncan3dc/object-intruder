<?php

namespace duncan3dc\ObjectIntruderTests;

use duncan3dc\ObjectIntruder\Intruder;
use PHPUnit\Framework\TestCase;

class InheritanceTest extends TestCase
{
    /** @var ChildClass */
    private $class;

    /** @var Intruder */
    private $intruder;


    public function setUp(): void
    {
        $this->class = new ChildClass();
        $this->intruder = new Intruder($this->class);
    }


    public function testChildMethod(): void
    {
        $this->assertSame("child", $this->intruder->child());
    }


    public function testParentMethod(): void
    {
        $this->assertSame("parent", $this->intruder->parent());
    }


    public function testGrandparentMethod(): void
    {
        $this->assertSame("grandparent", $this->intruder->grandparent());
    }


    public function testMissingMethod(): void
    {
        $this->expectException(\ReflectionException::class);
        if (\PHP_MAJOR_VERSION < 8) {
            $this->expectExceptionMessage("Method noSuchMethod does not exist");
        } else {
            $this->expectExceptionMessage("Method duncan3dc\\ObjectIntruderTests\\ChildClass::noSuchMethod() does not exist");
        }
        $this->intruder->noSuchMethod();
    }


    public function testSiblingMethod(): void
    {
        $this->assertSame("sibling", $this->intruder->sibling());
    }


    public function testAuntieMethod(): void
    {
        $this->assertSame("auntie", $this->intruder->auntie());
    }


    public function testChildProperty(): void
    {
        $this->assertSame("child", $this->intruder->child);
    }


    public function testParentProperty(): void
    {
        $this->assertSame("parent", $this->intruder->parent);
    }


    public function testGrandparentProperty(): void
    {
        $this->assertSame("grandparent", $this->intruder->grandparent);
    }


    public function testMissingProperty(): void
    {
        $this->expectException(\ReflectionException::class);
        if (\PHP_MAJOR_VERSION < 8) {
            $this->expectExceptionMessage("Property noSuchProperty does not exist");
        } else {
            $this->expectExceptionMessage("Property duncan3dc\\ObjectIntruderTests\\ChildClass::\$noSuchProperty does not exist");
        }
        $this->intruder->noSuchProperty;
    }


    public function testSiblingProperty(): void
    {
        $this->assertSame("sibling", $this->intruder->sibling);
    }


    public function testAuntieProperty(): void
    {
        $this->assertSame("auntie", $this->intruder->auntie);
    }
}
