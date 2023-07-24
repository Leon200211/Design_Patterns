<?php

class OrderUpdateAdmin implements OrderUpdateInterface
{
    public function run(Order $order, array $orderData): Order
    {
        // TODO: Implement run() method.
        $updateDecorators = $this->createStackDecorators();
        return $updateDecorators->run($order, $orderData);
    }

    private function createStackDecorators()
    {
        $orderUpdateLogger = new OrderUpdateDecoratorLogger(new OrderUpdate());

        return new OrderUpdateDecoratorNotifierUsers($orderUpdateLogger);
    }
}