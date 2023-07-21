<?php

class ObjectsFactory
{
    private $faker;

    public function __construct()
    {
        $this->faker = app(Faker::class);
    }

    public function createIngredients(int $cnt) : array
    {
        $result = [];
        for ($i = 1; $i <= $cnt; $i++) {
            $result[] = $this->createIngredient($i);
        }

        return $result;
    }

    private function createIngredient(int $id) : object
    {
        $obj = new Ingredient();
        $obj->id = $id;
        $obj->name = $this->faker->colorName;

        return $obj;
    }

    public function createProducts(int $cnt, array $ingredients) : array
    {
        $result = [];
        for ($i = 1; $i <= $cnt; $i++) {
            $prodictIngredients = Arr::random($ingredients, rand(2, 3));

            $result[] = $this->createProduct($i, $prodictIngredients);
        }
        return $result;
    }

    private function createProduct(int $id, array $ingredients)
    {
        $obj = new Product();
        $obj->id = $id;
        $obj->name = $this->faker->company;

        foreach ($ingredients as $ingredient) {
            $obj->setChildItem($ingredient);
        }

        return $obj;
    }


    public function createOrders(int $cnt, array $ingredients) : array
    {
        $result = [];
        for ($i = 1; $i <= $cnt; $i++) {
            $prodictIngredients = Arr::random($ingredients, rand(1, 3));

            $result[] = $this->createOrder($i, $prodictIngredients);
        }
        return $result;
    }

    private function createOrder(int $id, array $children)
    {
        $obj = new Order();
        $obj->id = $id;
        $obj->name = "order_$id";

        foreach ($children as $child) {
            $obj->setChildItem($child);
        }

        return $obj;
    }

}