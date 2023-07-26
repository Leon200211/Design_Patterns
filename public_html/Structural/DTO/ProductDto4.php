<?php

class ProductDto4
{
    public int $id;
    public string $name;
    public int $categoryId;

    public static function createFromRequest(\http\Env\Request $request): self
    {
        return self::createFromArray($request->validated());
    }

    public static function createFromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'];
        $dto->name = $data['name'];
        $dto->categoryId = $data['categoryId'];

        return $dto;
    }
}