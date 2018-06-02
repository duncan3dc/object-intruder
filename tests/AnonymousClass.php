<?php

namespace duncan3dc\ObjectIntruderTests;

class AnonymousClass
{
    /** @var string */
    public $publicProperty = "R2-D2";

    /** @var string */
    protected $protectedProperty = "C-3PO";

    /** @var string */
    private $privateProperty = "BB-8";


    public function publicMethod(): string
    {
        return "episode";
    }
    protected function protectedMethod(string $subtitle): string
    {
        return "episode: {$subtitle}";
    }
    private function privateMethod(string $subtitle, string $extra): string
    {
        return "episode: {$subtitle} - {$extra}";
    }


    public function referenceMethod(string &$stuff): string
    {
        $stuff = "modified";
        return "done";
    }


    public function __toString(): string
    {
        return "star wars";
    }
}
