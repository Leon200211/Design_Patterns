<?php

class OrderPriceComposite
{
    private $factory;

    private $ingredientsCnt = 10;
    private $ingredients = [];

    private $productsCnt = 5;
    private $products = [];

    private $ordersCnt = 2;
    private $orders = [];


    public function __construct()
    {
        $this->factory = new ObjectsFactory();
    }

    public function run()
    {
        $this->initObjects();
        $this->calcPrice();
    }

    private function initObjects()
    {
        $this->ingredients = $this->factory->createIngredients($this->ingredientsCnt);
        $this->products = $this->factory->createProducts($this->productsCnt, $this->ingredients);
        $this->orders = $this->factory->createOrder($this->ordersCnt, $this->products);
    }

}