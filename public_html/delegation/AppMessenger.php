<?php

use delegation\interfaces\MessengerInterface;
use \delegation\messengers\EmailMessenger;
use \delegation\messengers\SnsMessenger;

class AppMessenger implements MessengerInterface
{
    private $messenger;

    public function __construct()
    {
        $this->toEmail();
    }

    public function toEmail()
    {
        $this->messenger = new EmailMessenger();
        return $this;
    }

    public function toSms()
    {
        $this->messenger = new SnsMessenger();
        return $this;
    }

    public function setSender($value): MessengerInterface
    {
        // TODO: Implement setSender() method.
        $this->messenger->setSender($value);
        return $this->messenger;
    }

    public function setRecipient($value): MessengerInterface
    {
        // TODO: Implement setRecipient() method.
        $this->messenger->setRecipient($value);
        return $this->messenger;
    }

    public function setMessage($value): MessengerInterface
    {
        // TODO: Implement setMessage() method.
        $this->messenger->setMessage($value);
        return $this->messenger;
    }

    public function send(): bool
    {
        // TODO: Implement send() method.
        return $this->messenger->send();
    }

}