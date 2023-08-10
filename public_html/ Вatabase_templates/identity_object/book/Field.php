<?php

class Field
{
    protected array $comps = [];
    protected bool $incomplete = false;

    // Установка имени поля (например, age)
    public function __construct(protected string $name)
    {
    }

    // Добавление оператора и значения для тестирования
    // (например, больше 40), а также свойство $comps
    public function addTest(string $operator, $value): void
    {
        $this->comps[] = [
            'name' => $this->name,
            'operator' => $operator,
            'value' => $value
        ];
    }

    // $comps - это массив, поэтому одно поле
    // можно проверить не одним, а несколькими способами
    public function getComps(): array
    {
        return $this->comps;
    }

    // Если массив $comps не содержит элементов,
    // значит, данные сравнения с полем и
    // само поле не готовы для применения в запросе
    public function isIncomplete(): bool
    {
        return empty($this->comps);
    }

}