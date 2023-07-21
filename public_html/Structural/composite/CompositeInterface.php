<?php

interface CompositeInterface extends CompositeItemInterface
{
    public function setChildItem(CompositeInterface $item);
}