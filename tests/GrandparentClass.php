<?php

namespace duncan3dc\ObjectIntruderTests;

class GrandparentClass
{
    /** @var string */
    private $grandparent = "grandparent";

    private function grandparent(): string
    {
        return "grandparent";
    }
}
