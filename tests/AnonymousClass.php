<?php

namespace duncan3dc\ObjectIntruderTests;

class AnonymousClass
{
    public $publicProperty = "R2-D2";
    protected $protectedProperty = "C-3PO";
    private $privateProperty = "BB-8";


    public function publicMethod()
    {
        return "episode";
    }
    protected function protectedMethod($subtitle)
    {
        return "episode: {$subtitle}";
    }
    private function privateMethod($subtitle, $extra)
    {
        return "episode: {$subtitle} - {$extra}";
    }


    public function __toString()
    {
        return "star wars";
    }
}
