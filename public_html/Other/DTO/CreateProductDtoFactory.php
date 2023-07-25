<?php

class CreateProductDtoFactory
{
    public static function fromRequest(\http\Env\Request $request): ProductDto
    {
        return self::fromArray($request->validated());
    }

    public static function fromArray(array $data): ProductDto
    {
        $dto = new ProductDto();

        $dto->id = $data['id'];
        $dto->name = $data['name'];
        $dto->categoryId = $data['categoryId'];

        return $dto;
    }

}