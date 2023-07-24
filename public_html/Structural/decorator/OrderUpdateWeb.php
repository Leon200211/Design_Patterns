<?php

class OrderUpdateWeb implements OrderUpdateInterface
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
        $orderUpdateNotifierManagers = new OrderUpdateDecoratorNotifierManagers($orderUpdateLogger);

        return new OrderUpdateDecoratorNotifierUsers($orderUpdateNotifierManagers);
    }
}