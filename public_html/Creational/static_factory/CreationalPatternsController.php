<?php

class CreationalPatternsController
{
    private $guiKit;

    public function __construct()
    {
        //$this->guiKit = (new GuiKitFactory())->getFactory($type);
    }

    public function StaticFactory()
    {
        $appMailMessenger = StaticFactory::build('email');
        $appPhoneMessenger = StaticFactory::build('sms');
    }

}