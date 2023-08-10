<?php


// Листинг 13.38
//$idobj = new EventldentityObject();
//$idobj->setMinimumStart(time());
//$idobj->setName("A Fine Show");
//$comps = [];
//$name = $idobj->getName();
//if (!is_null($name)) {
//    $comps[] = "name = '{$name} ’";
//}
//$minstart = $idobj->getMinimumStart();
//if (!is_null($minstart)) {
//    $comps[] = "start > {$minstart}";
//}
//$start = $idobj->getStart();
//if (!is_null($start)) {
//    $comps[] = "start = '{$start}'";
//}
//$clause = " WHERE " . implode(" and ", $comps);
//print "{$clause}\n";



function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}


spl_autoload_register('autoloadMainClasses');

$idobj = new IdentityObject();
$idobj->field("name")
    ->eq("'The Good Show'")
    ->field("start")
    ->gt(time())
    ->lt(time() + (24 * 60 * 60));
