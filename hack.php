#!/usr/bin/env php
<?php

use duncan3dc\ObjectIntruder\Intruder;
use duncan3dc\ObjectIntruder\IntruderInterface;

class Example
{
    /** @var string */
    private $private = "PRIVATE";

    /** @var int */
    private $protected = 7;

    /** @var \DateTime */
    public $public;

    private function getPrivate(): string
    {
        return "private";
    }
    private function getProtected(): int
    {
        return 8;
    }
    public function getPublic(): \DateTime
    {
        return new \DateTime();
    }
}

/** @var Example */
$example1 = new Example();
#if ($example1->public) {}
#if ($example1->getPublic()) {}

/** @var Example&IntruderInterface */
$example2 = Intruder::intrude($example1);
if (is_string($example2->private)) {}
#if (is_int($example2->protected)) {}
#if ($example2->public) {}
#if (is_string($example2->getPrivate())) {}
#if (is_string($example2->getProtected())) {}
#if ($example2->getPublic()) {}
