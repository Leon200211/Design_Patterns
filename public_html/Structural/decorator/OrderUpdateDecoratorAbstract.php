<?php

abstract class OrderUpdateDecoratorAbstract implements OrderUpdateInterface
{
    protected $decoratedObject;

    public function __construct(OrderUpdateInterface $decoratedObject)
    {
        $this->decoratedObject = $decoratedObject;
    }

    public function run(Order $order, array $orderData): Order
    {
        // TODO: Implement run() method.
        $this->actionBefore();
        $this->actionMain($order, $orderData);
        $this->actionAfter();

        return $order;
    }

    protected function actionBefore()
    {

    }

    protected function actionMain(Order $order, array $orderData) : Order
    {
        return $this->decoratedObject->run($order, $orderData);
    }

    protected function actionAfter()
    {

    }

}