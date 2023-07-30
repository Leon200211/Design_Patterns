<?php


$army = new Army() ;
$army->addUnit(new Archer());
$found = [
    new Cavalry(),
    new NullUnit(),
    new LaserCanonUnit(),
    $army
];
print_r($found);
