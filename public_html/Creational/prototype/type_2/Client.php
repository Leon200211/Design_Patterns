<?php

class Client
{
    public $id;
    public $name;
    public $order;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function addOrder(Order $order)
    {
        $this->order[$order->id] = $order;
    }

}