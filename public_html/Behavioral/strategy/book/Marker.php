<?php

abstract class Marker
{
    public function __construct(protected string $test)
    {
    }

    abstract public function mark(string $response): bool;
}