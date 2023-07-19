<?php

interface GuiFactoryInterface
{

    public function buildButton() : ButtonInterface;
    public function buildCheckBox() : CheckBoxInterface;

}