<?php


interface PropertyContainerInterface
{
    function setProperty($propertyName, $value);  // для установки свойств
    function updateProperty($propertyName, $value);  // обновить свойство
    function getProperty($propertyName);  // получить свойство
    function deleteProperty($propertyName);  // удалить свойство
}