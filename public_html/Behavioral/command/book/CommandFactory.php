<?php

class CommandFactory
{
    private static string $dir = ' command';

    public static function getCommand(string $action = 'Default'): Command
    {
        if (preg_match('/\W/', $action)) {
            throw new \Exception("Неверные символы в команде");
        }

        $class = __NAMESPACE__ . "WcommandsW" . UCFirst(strtolower($action)) . "Command";

        if (!class_exists($class)) {
            throw new CommandNotFoundException("Класс '$class' не обнаружен");
        }

        $cmd = new $class();
        return $cmd;
    }

}