<?php

class StructuralPatternsController
{
    /**
     * Для любителей Porto
     */
    public function dtoFactory(CreateProductRequest $request)
    {
        $dto = CreateProductDtoFactory::fromRequest($request);
        $result = app(CreateProductAction::class)->run($dto);

        return $this->responce($result);
    }

    /**
     * Для люьителей сервисного слоя
     */
    public function dtoRequest(CreateProductRequest $request)
    {
        $dto = $request->getDto();
        $result = app(CreateProductService::class)->run($dto);

        return $this->response($result);
    }

    /**
     * Вариант, когда ДТО - зашквар,
     * а реквест пробросить в бизнес-логике типа норм
     */
    public function withoutDto(CreateProductRequest $request)
    {
        $result = app(CreateProductAction::class)->run($request);

        return $this->response($result);
    }

}