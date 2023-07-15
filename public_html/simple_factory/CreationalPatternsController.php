<?php

class CreationalPatternsController
{

    public function SimpleFactory()
    {
        $factory = new MessangerSimpleFactory();
        $appMailMessenger = $factory->build('email');
        $appPhoneMessenger = $factory->build('sms');
    }

}