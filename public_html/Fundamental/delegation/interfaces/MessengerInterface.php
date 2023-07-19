<?php

namespace delegation\interfaces;

interface MessengerInterface
{
    public function setSender($value): MessengerInterface;
    public function setRecipient($value): MessengerInterface;
    public function setMessage($value): MessengerInterface;
    public function send(): bool;
}