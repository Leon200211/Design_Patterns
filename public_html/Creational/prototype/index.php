<?php



function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}

spl_autoload_register('autoloadMainClasses');


$factory = new TerrainFactory(new EarthSea(), new EarthPlains(), new EarthForest());

print_r($factory->getSea());
print_r($factory->getForest());
print_r($factory->getPlains());

