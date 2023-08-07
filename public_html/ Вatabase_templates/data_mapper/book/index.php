<?php


$mapper = new VenueMapper();
$venue = $mapper->find(2);
print_r($venue);



$mapper = new VenueMapper();
$venue = new Venue(-1, "The Likey Lounge");
// Добавление объекта в базу данных
$mapper->insert($venue);
// Еще раз ищем объект для проверки, что все работает
$venue = $mapper->find($venue->getld());
print_r($venue);
// Изменяем наш объект
$venue->setName("The Bibble Beer Likey Lounge");
// Вызов update для добавления измененных данных
$mapper->update($venue);
// Снова обращаемся к базе данных для проверки работоспособности
$venue = $mapper->find($venue->getld());
print_r($venue);



// Листинг 13.9
$reg = Registry::instance();
$collection = $reg->getVenueCollection();
$collection->add(new Venue(-1, "Loud and Thumping"));
$collection->add(new Venue(-1, "Eeezy"));
$collection->add(new Venue(-1, "Duck and Badger"));
foreach ($collection as $venue) {
    print $venue->getName() . "\n";
}


// Листинг 13.11
$genvencoll = new GenVenueCollection();
$genvencoll->add(new Venue(-1, "Loud and Thumping"));
$genvencoll->add(new Venue(-1, "Eeezy"));
$genvencoll->add(new Venue(-1, "Duck and Badger"));
$gen = $genvencoll->getGenerator();
foreach ($gen as $wrapper)
{
    print_r($wrapper);
}
