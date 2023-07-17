<?php

class Container
{
    public Contained $contained;
    public function __construct()
    {
        $this->contained = new Contained();
    }
    public function __clone()
    {
        // Обеспечить, чтобы клонированый объект
        // содержал клон объекта, хранящегося в
        // свойстве self::$contained
        // а не ссылку на него
        $this->contained = clone $this->contained;
    }
}