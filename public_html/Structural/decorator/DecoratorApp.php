<?php

class DecoratorApp
{
    public function run()
    {
        $order = new Order();
        $orderData = [];
        $updateOrderObj = $this->getUpdateOrderObj();

        $updateOrderObj->run($order, $orderData);
    }

    private function getUpdateOrderObj() : OrderUpdateInterface
    {
        // Простой способо
        //return new OrderUpdateDecoratorLogger(new OrderUpdate());

        // Вложенные декораторы
        //$orderUpdateLogger = new OrderUpdateDecoratorLogger(new OrderUpdate());
        //$orderUpdateNotifierManagers = new OrderUpdateDecoratorNotifierManagers($orderUpdateLogger);
        //return new OrderUpdateDecoratorNotifierUsers($orderUpdateNotifierManagers);

        // Вложенные декораторы c выносом
        //return new OrderUpdateWeb();
        //return new OrderUpdateAdmin();

    }
}