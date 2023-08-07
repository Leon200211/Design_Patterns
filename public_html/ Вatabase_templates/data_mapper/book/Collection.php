<?php

abstract class Collection implements \Iterator
{
    protected int $total = 0;
    private int $pointer = 0;
    private array $objects = [];

    public function __construct(protected array $raw = [], protected? Mapper $mapper = null)
    {
        $this->total = count($raw);
        if (count($raw) && is_null($mapper))
        {
            throw new AppException("Для генерации объекта нужен Mapper");
        }
    }

    public function add(DomainObject $object): void
    {
        $class = $this->targetClass();
        if (!($object instanceof $class)) {
            throw new AppException("Это коллекция {$class}");
        }
        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    abstract public function targetClass(): string;
    protected function notifyAccess(): void
    {
        // Специально оставлен пустым!
    }

    private function getRow(int $num): ? DomainObject
    {
        $this->notifyAccess();
        if ($num >= $this->total || $num < 0) {
            return null;
        }
        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }
        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->mapper->createObject($this->raw[$num]);
            return $this->objects[$num];
        }

        return null;
    }

    public function rewind(): void
    {
        $this->pointer = 0;
    }

    public function current(): ? DomainObject
    {
        return $this->getRow($this->pointer);
    }

    public function key(): mixed
    {
        return $this->pointer;
    }

    public function next(): void
    {
        $row = $this->getRow($this->pointer);
        if (!is_null($row)) {
            $this->pointer++;
        }
    }

    public function valid(): bool
    {
        return (!is_null($this->current()));
    }

}