<?php

class PropertyDemo
{

    public function run()
    {
        $client = new Client();

        $deliveryDt = Carbon::parse('31.12.2023 15:00:00');
        $order = new Order(11, $deliveryDt, $client);

        $client->addOrder($order);

        $cloneOrder = clone $order;
        $cloneOrder->deliveryDr->addDay();

        return compact('client', 'order', 'cloneOrder');

    }

}