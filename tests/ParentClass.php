<?php

namespace duncan3dc\ObjectIntruderTests;

class ParentClass extends GrandparentClass
{
    use AuntieTrait;

    /** @var string */
    private $parent = "parent";

    private function parent(): string
    {
        return "parent";
    }
}
