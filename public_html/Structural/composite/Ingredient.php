<?php

class Ingredient extends Model implements CompositeItemInterface
{
    public $type = 'Ингредиент';

    public function calcPrice() : float
    {
        if ($this->price) {
            return $this->price;
        }

        $this->price = Arr::random([10, 20, 30, 40, 50]);

        return $this->price;
    }

}