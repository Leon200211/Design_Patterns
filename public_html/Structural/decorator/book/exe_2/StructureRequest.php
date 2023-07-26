<?php

class StructureRequest extends DecorateProcess
{
    public function process(RequestHelper $req): void
    {
        print_r(__CLASS__ . " данные структурирующего запроса");
        $this->processrequest->process($req);
    }
}