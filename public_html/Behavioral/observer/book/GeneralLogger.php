<?php

class GeneralLogger extends LoginObserver
{

    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // Добавление данных о входе в журнал
        print __CLASS__ . "добавление данных о входе в журнал\п";
    }

}