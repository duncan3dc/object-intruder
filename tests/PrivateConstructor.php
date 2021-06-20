<?php

namespace duncan3dc\ObjectIntruderTests;

class PrivateConstructor
{
    private string $text;
    private int $number;

    private function __construct(string $text, int $number)
    {
        $this->text = $text;
        $this->number = $number;
    }
}
