<?php

class PartnershipTool extends LoginObserver
{
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // Проверка $iр-адреса
        // Установка cookie при соответствии списку
        echo __CLASS__ . "Установка cookie при соответствии списку\п";
    }
}