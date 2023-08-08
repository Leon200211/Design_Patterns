<?php

abstract class Mapper
{
    public function find(int $id): ? DomainObject
    {
        $old = $this->getFromMap($id);

        if (!is_null($old)) {
            return $old;
        }
        return $object;
    }

    abstract protected function targetClass(): string;

    private function getFromMap($id): ? DomainObject
    {
        return ObjectWatcher::exist($this->targetClass(), $id);
    }

    private function addToMap(DomainObject $obj): void
    {
        ObjectWatcher::add($obj);
    }

    public function createObject($raw): ? DomainObject
    {
        $old = $this->getFromMap((int)$raw['id']);

        if (!is_null($old)) {
            return $old;
        }

        $obj = $this->doCreateObject($raw);
        $this->addToMap($obj);
        return $obj;
    }

    public function insert(DomainObject $obj): void
    {
        $this->doInsert($obj);
        $this->addToMap($obj);
    }
}