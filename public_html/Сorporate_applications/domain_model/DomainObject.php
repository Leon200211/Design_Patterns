<?php

abstract class DomainObject
{
    public function __construct(private int $id)
    {
    }
    public function getld(): int
    {
        return $this->id;
    }
    public static function getCollection(string $type): Collection
    {
        // Фиктивная реализация
        return Collection::getCollection($type);
    }
    public function markDirty(): void
    {
        //
    }
}