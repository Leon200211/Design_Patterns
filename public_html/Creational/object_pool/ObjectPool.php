<?php

class ObjectPool
{
    use SingletonTrait;

    private $clones = [];
    private $prototypes = [];

    public function addObject(ObjectPullableInterface $obj)
    {
        $key = $this->getObjKey($obj);
        $this->prototypes[$key] = $obj;

        return $this;
    }

    private function getObjKey($obj)
    {
        if (is_object($obj)) {
            $key = get_class($obj);
        } else if (is_string($obj)) {
            $key = $obj;
        } else {
            throw new Exception('????');
        }

        return $key;
    }

    public function getObject(string $className)
    {
        $key = $this->getObjKey($className);

        if (isset($this->clones[$key])) {
            return false;
        }

        if (empty($this->prototypes[$key])) {
            return null;
        }

        $this->clones[$key] = clone $this->prototypes[$key];

        return $this->clones[$key];
    }

    public function release(ObjectPullableInterface $obj)
    {
        $key = $this->getObjKey($obj);
        unset($this->clones[$key]);
        $obj = null;
    }

}