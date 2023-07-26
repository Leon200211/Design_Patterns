<?php

class LogRequest extends DecorateProcess
{
    public function process(RequestHelper $req): void
    {
        print_r(__CLASS__ . " запрос журналирования");
        $this->processrequest->process($req);
    }
}