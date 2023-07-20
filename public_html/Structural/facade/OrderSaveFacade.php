<?php

class OrderSaveFacade
{
    public function save(Order $order, array $data) : bool
    {
        (new OrderSaveProducts($order, $data))->run();
        (new OrderSaveDates($order, $data))->run();
        (new OrderSaveUsers($order, $data))->run();

        return true;
    }
}