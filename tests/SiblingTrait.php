<?php

namespace duncan3dc\ObjectIntruderTests;

trait SiblingTrait
{
    private $sibling = "sibling";

    private function sibling()
    {
        return "sibling";
    }
}
