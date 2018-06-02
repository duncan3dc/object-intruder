<?php

namespace duncan3dc\ObjectIntruderTests;

trait SiblingTrait
{
    /** @var string */
    private $sibling = "sibling";

    private function sibling(): string
    {
        return "sibling";
    }
}
