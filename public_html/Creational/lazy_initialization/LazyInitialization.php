<?php

class LazyInitialization
{

    private $user = null;

    public function __construct()
    {
        //$this->user = User::first();
    }

    public function getUser()
    {
        if (is_null($this->user)) {
            $this->user = User::firts();
        }

        return $this->user;
    }

}