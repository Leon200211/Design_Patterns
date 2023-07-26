<?php
$process = new AuthenticateRequest(
    new StructureRequest(
        new LogRequest(
            new MainProcess()
        )
    )
);
$process->process(new RequestHelper());


/**
popp\chl0\batch07\AuthenticateRequest: запрос аутентификации
popp\chl0\batch07\StructureRequest: данные структурирующего запроса
popp\chl0\batch07\LogRequest: запрос журналирования
popp\chl0\batch07\MainProcess: выполнение запроса
 */
