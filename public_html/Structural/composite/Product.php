<?php

class Product extends Model implements CompositeInterface
{
    use CompositeTrait;

    public $type = 'Продукт';
}