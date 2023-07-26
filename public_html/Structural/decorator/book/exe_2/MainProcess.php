<?php

class MainProcess extends ProcessRequest
{
    public function process(RequestHelper $req): void
    {
        print_r (self::class . ": выполнение запроса\п");
    }
}