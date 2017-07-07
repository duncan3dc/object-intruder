<?php

namespace duncan3dc\ObjectIntruderTests;

use duncan3dc\ObjectIntruder\Intruder;

class InheritanceTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    private $intruder;

    public function setUp()
    {
        $this->class = new ChildClass;
        $this->intruder = new Intruder($this->class);
    }


    public function testChildMethod()
    {
        $this->assertSame("child", $this->intruder->child());
    }


    public function testParentMethod()
    {
        $this->assertSame("parent", $this->intruder->parent());
    }


    public function testGrandparentMethod()
    {
        $this->assertSame("grandparent", $this->intruder->grandparent());
    }


    public function testSiblingMethod()
    {
        $this->assertSame("sibling", $this->intruder->sibling());
    }


    public function testAuntieMethod()
    {
        $this->assertSame("auntie", $this->intruder->auntie());
    }


    public function testChildProperty()
    {
        $this->assertSame("child", $this->intruder->child);
    }


    public function testParentProperty()
    {
        $this->assertSame("parent", $this->intruder->parent);
    }


    public function testGrandparentProperty()
    {
        $this->assertSame("grandparent", $this->intruder->grandparent);
    }


    public function testSiblingProperty()
    {
        $this->assertSame("sibling", $this->intruder->sibling);
    }


    public function testAuntieProperty()
    {
        $this->assertSame("auntie", $this->intruder->auntie);
    }
}
