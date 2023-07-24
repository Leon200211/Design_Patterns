<?php

class ProductRepositoryProxy implements ProductRepositoryInterface
{
    private ProductRepositoryInterface $obj;

    public function __construct()
    {
        $this->obj = new ProductRepositoryImpl();
    }

    public function find(int $productId)
    {
        $key = $productId;
        $ttl = 'test';

        return cache()->remember($key, $ttl, function () use ($productId) {
           return "Proxy" . $this->obj->find($productId);
        });
    }
}