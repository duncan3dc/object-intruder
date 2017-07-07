<?php

namespace duncan3dc\ObjectIntruderTests;

class GrandparentClass
{
    private $grandparent = "grandparent";

    private function grandparent()
    {
        return "grandparent";
    }
}
