<?php

trait MultitonTrait
{
    protected static $instances = [];

    private $name;

    /**
     * Запрещаем прямое создание
     */
    private function __construct()
    {

    }

    /**
     * Запрещаем копирование
     */
    private function __clone()
    {

    }

    /**
     * Запрещаем десериализацию
     */
    private function __wakeup()
    {

    }

    public static function getInstance(string $instanceName) : MultitonInterface
    {
        if (isset(static::$instances[$instanceName])) {
            return static::$instances[$instanceName];
        }

        static::$instances[$instanceName] = new static();
        static::$instances[$instanceName]->setName($instanceName);

        return static::$instances[$instanceName];
    }

    public function setName($value)
    {
        $this->name = $value;

        return $this;
    }

}