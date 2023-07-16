<?php

class SimpleSingleton
{

    private static object $instance;
    private string $test;

    public static function getInstance() : object
    {
        return static::$instance ?? (static::$instance = new static());
    }

    public function setTest(string $val) : void
    {
        $this->test = $val;
    }

}