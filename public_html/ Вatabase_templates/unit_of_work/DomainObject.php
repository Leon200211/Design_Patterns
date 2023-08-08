<?php

abstract class DomainObject
{
    public function __construct(private int $id = -1)
    {
        if ($id < 0) {
            $this->markNew();
        }
    }

    abstract public function getFinder(): Mapper;

    public function getld(): int
    {
        return $this->id;
    }

    public function setld(int $id): void
    {
        $this->id = $id;
    }

    public function markNew(): void
    {
        ObjectWatcher::addNew($this);
    }

    public function markDeleted(): void
    {
        ObjectWatcher::addDelete($this);
    }
    public function markDirty(): void
    {
        ObjectWatcher::addDirty($this);
    }
    public function markClean(): void
    {
        ObjectWatcher::addClean($this);
    }
}