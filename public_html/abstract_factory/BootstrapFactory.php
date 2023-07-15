<?php

class BootstrapFactory implements GuiFactoryInterface
{

    public function buildButton(): ButtonInterface
    {
        // TODO: Implement buildButton() method.
        return new ButtonBootstrap();
    }

    public function buildCheckBox(): CheckBoxInterface
    {
        // TODO: Implement buildCheckBox() method.
        return new CheckBoxBootstrap();
    }

}