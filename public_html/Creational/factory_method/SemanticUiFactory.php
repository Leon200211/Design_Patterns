<?php

class SemanticUiFactory implements GuiFactoryInterface
{
    public function buildButton(): ButtonInterface
    {
        // TODO: Implement buildButton() method.
        return new ButtonSemanticUi();
    }

    public function buildCheckBox(): CheckBoxInterface
    {
        // TODO: Implement buildCheckBox() method.
        return new CheckBoxSemanticUi();
    }
}