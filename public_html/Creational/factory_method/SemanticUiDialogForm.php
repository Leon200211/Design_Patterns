<?php

class SemanticUiDialogForm extends AbstractForm
{

    public function createGuiKit(): GuiFactoryInterface
    {
        // TODO: Implement createGuiKit() method.
        return new SemanticUiFactory();
    }

}