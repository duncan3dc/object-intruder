<?php

namespace duncan3dc\ObjectIntruderTests;

class ParentClass extends GrandparentClass
{
    use AuntieTrait;

    private $parent = "parent";

    private function parent()
    {
        return "parent";
    }
}
