<?php


function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}


spl_autoload_register('autoloadMainClasses');



$simple_singeltone['ss1'] = SimpleSingleton::getInstance();
$simple_singeltone['ss1']->setTest('asdasd');
$simple_singeltone['ss2'] = SimpleSingleton::getInstance();

echo "<pre>";
print_r($simple_singeltone);
echo "<pre>";



$advanced_singleton['as1'] = AdvancedSingleton::getInstance();
$advanced_singleton['as1']->setTest('asdasd');
$advanced_singleton['as2'] = AdvancedSingleton::getInstance();

echo "<pre>";
print_r($advanced_singleton);
echo "<pre>";