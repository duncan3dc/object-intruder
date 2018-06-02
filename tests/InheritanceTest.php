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


    public function testSiblingProperty(): void
    {
        $this->assertSame("sibling", $this->intruder->sibling);
    }


    public function testAuntieProperty(): void
    {
        $this->assertSame("auntie", $this->intruder->auntie);
    }
}
