<?php

class AuthenticateRequest extends DecorateProcess
{
    public function process(RequestHelper $req): void
    {
        print_r(__CLASS__ . " запрос аутентификации");
        $this->processrequest->process($req);
    }
}