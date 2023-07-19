<?php

namespace delegation\messengers;

use delegation\interfaces\MessengerInterface;

abstract class AbstractMessenger implements MessengerInterface
{
    protected $sender;
    protected $recipient;
    protected $message;

    public function setSender($value): MessengerInterface
    {
        // TODO: Implement setSender() method.
        $this->sender = $value;
        return $this;
    }

    public function setRecipient($value): MessengerInterface
    {
        // TODO: Implement setRecipient() method.
        $this->recipient = $value;
        return $this;
    }

    public function setMessage($value): MessengerInterface
    {
        // TODO: Implement setMessage() method.
        $this->message = $value;
        return $this;
    }

    public function send(): bool
    {
        // TODO: Implement send() method.
        return true;
    }

}