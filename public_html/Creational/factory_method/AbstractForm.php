<?php

abstract class AbstractForm implements FormInterface
{

    public function render()
    {
        $guiKit = $this->createGuiKit();
        $result[] = $guiKit->buildCheckBox()->draw();
        $result[] = $guiKit->buildButton()->draw();

        return $result;
    }

    abstract function createGuiKit() : GuiFactoryInterface;

}