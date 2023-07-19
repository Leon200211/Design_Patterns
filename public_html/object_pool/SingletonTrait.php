<?php

trait SingletonTrait
{

    private static  $instance = null;

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

    public static function getInstance() : object
    {
        return static::$instance ?? (static::$instance = new static());
    }

}