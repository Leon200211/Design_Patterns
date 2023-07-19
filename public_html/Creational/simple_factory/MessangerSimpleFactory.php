<?php

class MessangerSimpleFactory
{
    public function build(string $type = 'email') : MessengerInterface
    {
        switch ($type)
        {
            case 'email':
                $messenger = new \delegation\messengers\EmailMessenger();
                $messenger->setSender('asd')->setMessage('test');
                break;
            case 'sms':
                $messenger = new \delegation\messengers\SnsMessenger();
                $messenger->setSender('asd')->setMessage('test');
                break;
            default:
                throw new Exception('Неизвестный тип');
        }

        return $messenger;

    }
}