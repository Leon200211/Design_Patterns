<?php
$main_army = new Army();
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCanonUnit());
$main_army->addUnit(new Cavalry());
$textdump = new TextDumpArmyVisitor();
$main_army->accept($textdump);
print $textdump->getText();


/**
   popp\chll\batch08\Army: Огневая мощь: 50
            popp\chll\batch08\Archer: Огневая мощь: 4
            popp\chll\batch08\LaserCannonUnit: Огневая мощь: 44
            popp\chll\batch08\Cavalry: Огневая мощь: 2
 */


$main_army = new Army() ;
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCanonUnit());
$main_army->addUnit(new Cavalry());
$taxcollector = new TaxCollectionVisitor();
$main_army->accept($taxcollector);
print $taxcollector->getReport();
print "ВСЕГО:";
print $taxcollector->getTax() . "\n";


/**
    Налог для popp\chll\batch08\Army: 1
    Налог для popp\chll\batch08\Archer: 2
    Налог для popp\chll\batch08\LaserCanonUnit: 1
    Налог для popp\chll\batch08\Cavalry: 3
    ВСЕГО: 7
 */