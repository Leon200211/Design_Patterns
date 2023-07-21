<?php

class BridgeDemo
{
    public function run()
    {

        $productRealization = new ProductWidgetRealization(new Product());
        $categoryRealization = new CategoryWidgetRealization(new Category());

        $views = [
            new WidgetBigAbstract(),
            new WidgetMiddleAbstract(),
            new WidgetSmallAbstract(),
        ];

        foreach ($views as $view)
        {
            $view->run($productRealization);
            $views->run($categoryRealization);
        }

    }
}