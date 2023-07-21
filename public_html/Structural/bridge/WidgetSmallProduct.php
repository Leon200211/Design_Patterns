<?php

class WidgetSmallProduct extends WidgetAbstract
{
    public function run(Product $product)
    {
        $viewData = $this->getRealizationLogic($product);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Product $product)
    {
        $id = $product->id;
        $fullTitle = $product->id . ':::' . $product->name;
        $description = $product->description;

        return compact('id', 'fullTitle', 'description');
    }
}