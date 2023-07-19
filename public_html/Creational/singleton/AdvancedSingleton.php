<?php

class AdvancedSingleton
{

    use SingletonTrait;

    private $test;

    public function setTest(string $val) : void
    {
        $this->test = $val;
    }

}