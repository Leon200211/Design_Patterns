<?php

$mapper = new VenueMapper();
$venue = new Venue(-1, 'Бар у Бори');
$mapper->insert($venue);

$venue1 = $mapper->find($venue->getld());
$venue2 = $mapper->find($venue->getld());

$venue1->setName('Бар у Вовы');
$venue2->setName('Бар у Владимира');

print $venue->getName() . '\n';
print $venue1->getName() . '\n';
print $venue2->getName() . '\n';
