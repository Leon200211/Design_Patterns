<?php



function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}


spl_autoload_register('autoloadMainClasses');



$builder = new BlogPostBuilder();
$posts[] = $builder->setTitle('test')->getBlogPost();

$manager = new BlogPostManager();
$manager->setBuilder($builder);

$posts[] = $manager->createCleanPost();
$posts[] = $manager->createNewPostIt();
$posts[] = $manager->createNewPostCats();


echo "<pre>";
print_r($posts);
echo "<pre>";

