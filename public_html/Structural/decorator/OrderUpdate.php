<?php

final class OrderUpdate implements OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order
    {
        // TODO: Implement run() method.
        echo 'Base update';
        return $order;
    }
}