<?php

class SecurityMonitor extends LoginObserver
{
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        if ($status[0] == Login::LOGIN_WRONG_PASS) {
            // Отправление письма сисадмину
            print __CLASS__ . ": письмо сисадмину\п";
        }
    }
}