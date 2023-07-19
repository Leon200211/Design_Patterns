<?php

//Контейнер свойств (англ. property container) — фундаментальный шаблон проектирования,
// который служит для обеспечения возможности динамического расширения свойств уже созданного объекта класса.
//Это достигается путем дополнительных свойств непосредственно самому объекту в некоторый "контейнер свойств",
// вместо расширения класса новыми свойствами.


//Недостатки
//При реализации контейнера свойств теряется строгая типизация.
//Интерфейс класса не полностью описывает содержание и, возможно, потребуется модифицировать интерфейс
//взаимодействия с классом, чтобы реализовать преимущества, полученные от добавленных атрибутов.
//Если используется сохранение объектов в базу данных, контейнер свойств требует написать реализацию для
//передачи данных из контейнера свойств объекта в таблицу. Использование контейнера свойств увеличивает сложность системы,
//вносит накладные расходы на потребление памяти приложением и частично снижает быстродействие при работе.

require_once('PropertyContainerInterface.php');


class PropertyContainer implements PropertyContainerInterface
{
    private $propertyContainer = [];

    /**
     * @param $propertyName
     * @param $value
     */
    function setProperty($propertyName, $value){
        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @param $propertyName
     * @param $value
     * @throws Exception
     */
    function updateProperty($propertyName, $value){
        if (!isset($this->propertyContainer[$propertyName])) {
            throw new Exception("Свойство '{$propertyName}' не найдено");
        }

        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @param $propertyName
     * @param $value
     * @return mixed
     */
    function getProperty($propertyName){
        return $this->propertyContainer[$propertyName];
    }

    /**
     * @param $propertyName
     * @param $value
     */
    function deleteProperty($propertyName){
        unset($this->propertyContainer[$propertyName]);
    }

}