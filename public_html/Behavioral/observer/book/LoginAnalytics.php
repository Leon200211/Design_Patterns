<?php

class LoginAnalytics implements Observer
{
    public function update(Observable $observable): void
    {
        // Небезопасно с точки зрения типов!
        $status = $observable->getStatus();
        print __CLASS__ . "обработка информации о состоянии\n";
    }

}