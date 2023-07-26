<?php

class CreationalPatternsController
{
    private $guiKit;

    public function __construct()
    {
        //$this->guiKit = (new GuiKitFactory())->getFactory($type);
    }

    public function FactoryMethod()
    {
        $name = 'фабрика';
        //$description = GuiKitFactory::getDescription();

        $dialogForm = new BootstrapDialogForm();
        $result = $dialogForm->render();

    }

}