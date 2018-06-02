<?php

namespace duncan3dc\ObjectIntruderTests;

trait AuntieTrait
{
    /** @var string */
    private $auntie = "auntie";

    private function auntie(): string
    {
        return "auntie";
    }
}
