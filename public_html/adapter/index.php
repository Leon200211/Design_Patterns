<?php



function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}


spl_autoload_register('autoloadMainClasses');


// Было
//$mediaLibrary = app(MediaLibrarySelfWritten::class);

// Стало
$mediaLibrary = app(MediaLibraryAdapter::class);



$result[] = $mediaLibrary->upload('ImageFile');
$result[] = $mediaLibrary->get('ImageFile');

echo "<pre>";
print_r($result);
echo "<pre>";

