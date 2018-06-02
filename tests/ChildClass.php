<?php

namespace duncan3dc\ObjectIntruderTests;

class ChildClass extends ParentClass
{
    use SiblingTrait;

    /** @var string */
    private $child = "child";

    private function child(): string
    {
        return "child";
    }
}
