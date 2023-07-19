<?php

class Order
{
    public $id;
    public $deliveryDt;
    private $client;

    public function __construct($id, Carbon $deliveryDt, Client $client)
    {
        $this->id = (string)$id;
        $this->deliveryDt = $deliveryDt;
        $this->client = $client;
    }


    // Решает проблему
    public function __clone()
    {
        $this->id = $this->id . '_copy';
        $this->deliveryDt = $this->deliveryDt->copy();

        $this->client->addOrder($this);
    }

}