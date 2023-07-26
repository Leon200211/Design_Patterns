<?php


function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}

spl_autoload_register('autoloadMainClasses');


$assembler = new ObjectAssembler("conf.XML");
$encode = $assembler->getComponent(ApptEncoder::class);
$appmaker = new AppointmentMaker2($encode);
$out = $appmaker->makeAppointment();

print_r($out);

