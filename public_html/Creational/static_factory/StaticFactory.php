<?php

class StaticFactory implements MessengerStaticFactoryInterface
{
    public static function build(string $type = 'email') : MessengerInterface
    {
        $messenger = new AppMessenger();

        switch ($type)
        {
            case 'email':
                $messenger->toEmail();
                $sender = 'admin@site.local';
                break;
            case 'sms':
                $messenger->toSms();
                $sender = '123123123123123';
                break;
            default:
                throw new Exception('Неизвестный тип');
        }

        $messenger->setSender($sender)->setMessage('default message');

        return $messenger;

    }
}