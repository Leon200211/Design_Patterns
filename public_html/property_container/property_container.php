<?php

require_once('BlogPost.php');


function my_print($obj){
    ?>
    <pre>
    <?= print_r ($obj); ?>
    </pre>
    <?php
}



$post = new BlogPost();

// присваиваем свойсво изначально объявленое в классе
$post->setTitle('Hello');


my_print($post); // вывод результата


// присваиваем динамическое свойство объекту
$post->setProperty('view_count', 100);

my_print($post); // вывод результата


$post->updateProperty('view_count', 200);

my_print($post); // вывод результата


echo $post->getProperty('view_count');

$post->deleteProperty('view_count');

my_print($post); // вывод результата

$post->setProperty('view_count_2', 100);


my_print($post); // вывод результата
