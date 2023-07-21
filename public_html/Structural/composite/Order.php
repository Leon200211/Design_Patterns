<?php

class Order extends Model implements CompositeInterface
{
    use CompositeTrait;

    public $type = 'Заказ';
}