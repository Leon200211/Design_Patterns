<?php

class SimpleMultiton implements MultitonInterface
{

    use MultitonTrait;

    private $test;

    public function setTest(string $value)
    {
        $this->test = $value;

        return $this;
    }

}