<?php

namespace delegation\messengers;

class EmailMessenger extends AbstractMessenger
{
    public function send(): bool
    {
        // TODO: Implement send() method.
        echo 'Sent by '.__METHOD__;
        return parent::send();
    }
}