<?php


$tile = new DiamondDecorator(new Plains());
print $tile->getWealthFactor(); // 4

$tile = new PollutionDecorator(new DiamondDecorator(new Plains()));
print $tile->getWealthFactor(); // 0

