<?php

class CreationalPatternsController
{
    private $guiKit;

    public function __construct(string $type)
    {
        $this->guiKit = (new GuiKitFactory())->getFactory($type);
    }

    public function AbstractFactory()
    {
        $name = 'Абстрактная фабрика';
        //$description = GuiKitFactory::getDescription();

        $this->guiKit->buildButton()->draw();
        $this->guiKit->buildCheckBox()->draw();

    }

}