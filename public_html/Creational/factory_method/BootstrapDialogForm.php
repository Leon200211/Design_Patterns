<?php

class BootstrapDialogForm extends AbstractForm
{
    public function createGuiKit(): GuiFactoryInterface
    {
        // TODO: Implement createGuiKit() method.
        return new BootstrapFactory();
    }
}