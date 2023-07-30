<?php

function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}


spl_autoload_register('autoloadMainClasses');



$controller = new Controller();
$context = $controller->getContext();
$context->addParam('action', 'login');
$context->addParam('username', 'Иван');
$context->addParam('pass', 'tiddles');
$controller->process();
print $context->getError();

