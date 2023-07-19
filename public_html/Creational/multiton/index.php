<?php


function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}

spl_autoload_register('autoloadMainClasses');


$multiton[] = SimpleMultiton::getInstance('mysql')->setTest('mysql-test');
$multiton[] = SimpleMultiton::getInstance('mongo');


echo "<pre>";
print_r($multiton);
echo "<pre>";

$multiton[] = SimpleMultiton::getInstance('mysql');
$multiton[] = SimpleMultiton::getInstance('mongo')->setTest('mongo-test');

$simpleMultitonNext = SimpleMultitonNext::getInstance('mysql');
$simpleMultitonNext->test2 = 'init';
$multiton[] = $simpleMultitonNext;

$simpleMultitonNext = SimpleMultitonNext::getInstance('mysql');
$simpleMultitonNext->test2 = 'init2';
$multiton[] = $simpleMultitonNext;

echo "<pre>";
print_r($multiton);
echo "<pre>";


