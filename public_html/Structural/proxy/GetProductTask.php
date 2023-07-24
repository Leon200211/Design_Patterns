<?php

class GetProductTask
{
    // Примитивно
    public function run(int $productId)
    {
        return (new ProductRepository())->find($productId);
    }

    // Выносим (2 и 3 пример с картинки)
    public function rumImpl(int $productId)
    {
        return app(ProductRepositoryInterface::class)->find($productId);
    }
}