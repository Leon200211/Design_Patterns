<?php

class OrderUpdateDecoratorLogger extends OrderUpdateDecoratorAbstract
{
    protected function actionBefore()
    {
        echo 'Log before';
    }

    protected function actionAfter()
    {
        echo 'Log after';
    }
}