<?php

class GuiKitFactory
{

    public function getFactory(string $type) : GuiFactoryInterface
    {
        switch ($type)
        {
            case 'bootstrap':
                $factory = new BootstrapFactory();
                break;
            case 'semanticui':
                $factory = new SemanticUiFactory();
                break;
            default:
                throw new \Exception("Неизвестный тип фабрики [{$type}]");
        }

        return $factory;

    }

    public static function getDescription()
    {

    }

}