<?php

namespace delegation\messengers;

class SnsMessenger
{
    public function send(): bool
    {
        // TODO: Implement send() method.
        echo 'Sent by '.__METHOD__;
        return parent::send();
    }
}