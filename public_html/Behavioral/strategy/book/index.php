<?php


function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}


spl_autoload_register('autoloadMainClasses');


$markers = [
    new RegexpMarker("/п.ть/"),
    new MatchMarker("пять"),
    new MarkLogicMarker('$input equals "пять"')
];


foreach ($markers as $marker) {
    print get_class($marker) . "\n";
    $question = new TextQuestion("Сколько лучей у пятиконечной звезды", $marker);

    foreach (["пять", "четыре"] as $response) {
        print " Ответ: $response: ";
        if ($question->mark($response)) {
            print "Верно\п";
        } else {
            print "НевернсЛп";
        }
    }

}
