<?php


/**
 * Усложняем, добавляем вспомогательные методы
 * не соответствует single responsibility
 */
class ProductDto2
{
    public int $id;
    public string $name;
    public int $categoryId;

    public function toArray(): array
    {
        return [];
    }

    public function toJson(): string
    {
        return '';
    }

}