<?php

interface OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order;
}